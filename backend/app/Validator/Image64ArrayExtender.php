<?php


namespace App\Validator;

use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use Illuminate\Contracts\Validation\Factory as Validator;
use Psr\Log\LoggerInterface;

class Image64ArrayExtender implements ValidatorRulesExtender
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Image64ArrayExtender constructor.
     * @param  LoggerInterface  $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param  Validator  $validator
     */
    public function extend(Validator $validator): void
    {
        $validator->extend('image64array', function ($attribute, $value, $params, $validator) {
            foreach ($value as $image) {
                if (!is_string($image)) {
                    $problem = new Problem(422);
                    $problem->setDetail('One of uploaded images is of invalid format.');
                    throw new ProblemException($problem);
                }

                $mimeType = explode(':', substr($image, 0, strpos($image, ';')))[1];
                $type = explode('/', $mimeType)[1];

                if (!in_array($type, $params)) {
                    return false;
                }
            }

            return true;
        });

        $validator->replacer('image64array', function ($message, $attribute, $rule, $params) {
            return str_replace(':values', join(",", $params), $message);
        });
    }
}
