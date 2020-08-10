<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\AuthorizeWorkshop;
use App\Http\Requests\Traits\DefaultItemsAware;
use App\Http\Requests\Traits\ManyToManyRules;
use App\Service\Database\Relations\ItemsAware;

class UpdatePaymentOption extends ProblemAwareRequest implements ItemsAware
{
    use AuthorizeWorkshop, ManyToManyRules, DefaultItemsAware;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getManyToManyUpdateRules();
    }
}
