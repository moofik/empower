<?php


namespace App\Http\Requests\Traits;


use Illuminate\Support\Str;

trait KeysToFields
{
    /**
     * @var bool
     */
    private $saveOriginalNames = false;

    protected function saveOriginalNames()
    {
        $this->saveOriginalNames = true;
    }

    protected function passedValidation()
    {
        $keys = array_keys($this->rules());

        foreach ($keys as $key) {
            $keyField = $key;

            if (!$this->saveOriginalNames) {
               $keyField = Str::camel($key);
            }

            $this->$keyField = $this->get($key);
        }
    }
}
