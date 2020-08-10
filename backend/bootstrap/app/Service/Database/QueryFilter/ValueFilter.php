<?php


namespace App\Service\Database\QueryFilter;


use Illuminate\Database\Eloquent\Builder;

class ValueFilter
{
    private $valueMap = [];

    private $operatorMap = [];

    /**
     * @var array
     */
    private $metadata = [];

    /**
     * ValueFilter constructor.
     * @param array $metadata
     */
    public function __construct(array $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @param string $column
     * @param string $operator
     * @param $value
     */
    public function add(string $column, string $operator, $value)
    {
        if ($operator === 'LIKE') {
            $value = '%'.mb_strtolower($value).'%';
        }

        $this->valueMap[$column] = $value;
        $this->operatorMap[$column] = $operator;
    }

    public function getPage(): ?int
    {
        return $this->metadata['page'] ?? null;
    }

    public function getPerPage(): ?int
    {
        return $this->metadata['perPage'] ?? null;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        foreach ($this->valueMap as $column => $value) {
            $orWhereColumns = explode(',', $column);

            if (!empty($orWhereColumns)) {
                $builder->where(function (Builder $query) use ($orWhereColumns, $column, $value) {
                    foreach ($orWhereColumns as $orWhereColumn) {
                        $orWhereHasColumns = explode('.', $orWhereColumn);

                        if (count($orWhereHasColumns) === 2) {
                            $relation = $orWhereHasColumns[0];
                            $field = $orWhereHasColumns[1];
                            $query->orWhereHas($relation, function (Builder $query) use ($field, $column, $value) {
                               $query->where($field, $this->operatorMap[$column], $value);
                            });
                        } else {
                            $query->orWhere($orWhereColumn, $this->operatorMap[$column], $value);
                        }
                    }
                });
            } else {
                $builder->where($column, $this->operatorMap[$column], $value);
            }
        }

        return $builder;
    }
}
