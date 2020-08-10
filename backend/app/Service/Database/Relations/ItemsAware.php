<?php


namespace App\Service\Database\Relations;


interface ItemsAware
{
    public function getItems(): array;
}
