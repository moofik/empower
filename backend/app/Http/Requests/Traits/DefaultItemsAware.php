<?php


namespace App\Http\Requests\Traits;


trait DefaultItemsAware
{
    /**
     * @var array
     */
    public $items;

    protected function passedValidation()
    {
        $this->items = $this->all();
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
