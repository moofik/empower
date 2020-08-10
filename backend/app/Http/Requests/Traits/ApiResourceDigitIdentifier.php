<?php


namespace App\Http\Requests\Traits;


trait ApiResourceDigitIdentifier
{
    public function getModelIdentifier()
    {
        preg_match('#[0-9]+#iu', $this->url(), $matches);

        if (!isset($matches[0])) {
            return false;
        }

        return $matches[0];
    }
}
