<?php


namespace App\Service\Database\Relations;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class RelationsUpdater
{
    /**
     * Update model many to many relations with ItemsAware DTO data.
     *
     * @param  Model  $model  - Model which ManyToMany relationship we want to update (for ManyToMany it means update pivot table)
     * @param  ItemsAware  $dto  - Data transfer object containing relatives identifiers
     * @param  Collection  $relatives  - Collection of items that has ManyToMany relations with model
     * @param  string  $relationName  - Name of relation in the model
     * (e.g. Book model can have 'authors' method which defining ManyToMany relationship with Authors model -
     * in this example string 'authors' is the relationName param we need)
     * @param  array  $pivotColumns
     * @return Collection - Collection of relative models (of $relationName) coupled with our $model
     */
    public function updateManyToMany(
        Model $model,
        ItemsAware $dto,
        Collection $relatives,
        string $relationName
    ): Collection {
        $this->errorIfRelationNotExists($model, $relationName);
        $existentRelations = $model->$relationName;

        foreach ($dto->getItems() as $item) {
            $alreadyExists = $existentRelations->find($item['id']) !== null;
            $relation = $relatives->find($item['id']);

            if (null === $relation) {
                throw new RelationUpdaterException(sprintf('No relations found for %s with id %d', $relationName, $item['id']));
            }

            if (!$relation instanceof HasPivot) {
                throw new RelationUpdaterException(sprintf('%s should implement %s', get_class($relation), HasPivot::class));
            }

            if ($item['active'] && !$alreadyExists) {
                $item = $this->sanitizeItem($item, $relation->getPivotFields());
                $model->$relationName()->attach($relation->id, $item);
            } elseif (!$item['active'] && $alreadyExists) {
                $model->$relationName()->detach($relation->id);
            } elseif ($item['active'] && $alreadyExists) {
                $item = $this->sanitizeItem($item, $relation->getPivotFields());
                if (!empty($item)) {
                    $model->$relationName()->updateExistingPivot($relation->id, $item);
                } else {
                    $model->$relationName()->syncWithoutDetaching($relation->id);
                }
            }
        }

        $model = $model->load($relationName);

        return $model->$relationName;
    }

    private function sanitizeItem(array $item, array $pivotFields)
    {
        foreach ($item as $field => $value) {
            if (!in_array($field, $pivotFields)) {
                unset($item[$field]);
            }
        }

        return $item;
    }

    /**
     * @param  Model  $model
     * @param  FormRequest  $request
     * @param  string  $relationName
     * @return Model
     */
    public function updateHasOne(Model $model, FormRequest $request, string $relationName): Model
    {
        $this->errorIfRelationNotExists($model, $relationName);

        $model->$relationName()->update($request->validated());
        $model = $model->load($relationName);

        return $model->$relationName;
    }

    /**
     * @param  Model  $model
     * @param  string  $relationName
     */
    private function errorIfRelationNotExists(Model $model, string $relationName)
    {
        if ($model->$relationName === null) {
            throw new \RuntimeException(sprintf('Relation %s not exist for model %s', $relationName, get_class($model)));
        }
    }
}
