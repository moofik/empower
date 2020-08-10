<?php


namespace App\Service\Api;


use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProblemException extends HttpException
{
    /**
     * @var Problem
     */
    private $problem;

    /**
     * ApiProblemException constructor.
     *
     * @param  Problem  $problem
     * @param  Throwable|null  $t
     * @param  array  $headers
     * @param  int  $code
     */
    public function __construct(Problem $problem, Throwable $t = null, array $headers = [], ?int $code = null)
    {
        parent::__construct($problem->getStatusCode(), $problem->getTitle(), $t, $headers, $code);
        $this->problem = $problem;
    }

    /**
     * @return Problem
     */
    public function getProblem(): Problem
    {
        return $this->problem;
    }
}
