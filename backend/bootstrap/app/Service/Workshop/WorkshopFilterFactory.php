<?php


namespace App\Service\Workshop;


use App\Service\Database\QueryFilter\RelationValueFilter;
use App\User;
use Illuminate\Http\Request;

class WorkshopFilterFactory
{
    public function createRelationFilter(Request $request)
    {
        $relationValueFilter = new RelationValueFilter();

        $makeValue = $request->get('make');

        if ($makeValue) {
            $relationValueFilter->whereRelationHas(User::RELATION_SHOP_BRAND, 'name', $makeValue);
        }

        $cityValue = $request->get('city');

        if ($cityValue) {
            $relationValueFilter->whereRelationHas(User::RELATION_SHOP_SETTINGS, 'city', $cityValue);
        }

        $nameValue = $request->get('name');

        if ($nameValue) {
            $relationValueFilter->whereRelationHas(User::RELATION_SHOP_SETTINGS, 'workshop_name', $nameValue);
        }

        return $relationValueFilter;
    }
}
