<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;
use App\Http\Requests\Traits\ManyToManyRules;
use App\Service\Database\Relations\ItemsAware;

class UpdateMake extends ProblemAwareRequest implements ItemsAware
{
    use AuthorizeWorkshop, ManyToManyRules;

    private $items;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $customRules = [
            'from' => 'required_if:active,true|nullable|integer|between:1900,2020',
            'to' => 'required_if:active,true|nullable|integer|between:1900,2020',
        ];

        return $this->getManyToManyUpdateRules($customRules);
    }

    protected function passedValidation()
    {
        $this->items = [];
        $requestItems = $this->all();

        foreach ($requestItems as $item) {
            $this->items[] = [
                'id' => $item['id'],
                'active' => $item['active'],
                'from' => $item['from'],
                'to' => $item['to'],
            ];
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
