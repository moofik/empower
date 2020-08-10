<?php


namespace App\Validator;

use Illuminate\Contracts\Validation\Factory as Validator;

class Image64Extender implements ValidatorRulesExtender
{
    /**
     * @param  Validator  $validator
     */
    public function extend(Validator $validator): void
    {
        $validator->extend('image64', function ($attribute, $value, $params, $validator) {
            $mimeType =  explode(':', substr($value, 0, strpos($value, ';')))[1];
            $type = explode('/', $mimeType)[1];

            if (in_array($type, $params)) {
                return true;
            }

            return false;
        });

        $validator->replacer('image64', function ($message, $attribute, $rule, $params) {
            return str_replace(':values', join(",", $params), $message);
        });
    }
}
