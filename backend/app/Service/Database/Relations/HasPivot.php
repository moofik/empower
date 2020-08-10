<?php


namespace App\Service\Database\Relations;


interface HasPivot
{
    /**
     * Belongs which columns should be selected and loaded from pivot table
     *
     * @return array
     */
    public function getPivotFields(): array;
}
