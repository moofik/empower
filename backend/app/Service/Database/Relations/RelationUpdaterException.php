<?php


namespace App\Service\Database\Relations;


use Throwable;

class RelationUpdaterException extends \RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
