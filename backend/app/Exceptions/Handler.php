<?php

namespace App\Exceptions;

use Exception;
use App\Service\Api\ProblemException;
use App\Service\Api\ProblemResponseFactory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Handler extends ExceptionHandler
{
    /**
     * @var ProblemResponseFactory
     */
    private $responseFactory;

    /**
     * Handler constructor.
     * @param  Container  $container
     * @param  ProblemResponseFactory  $responseFactory
     */
    public function __construct(Container $container, ProblemResponseFactory $responseFactory)
    {
        parent::__construct($container);
        $this->responseFactory = $responseFactory;
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  Exception  $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ProblemException) {
            return $this->responseFactory->create($exception->getProblem());
        }

        return parent::render($request, $exception);
    }

    protected function whoopsHandler()
    {
        try {
            return app(\Whoops\Handler\HandlerInterface::class);
        } catch (\Illuminate\Contracts\Container\BindingResolutionException $e) {
            return (new \Illuminate\Foundation\Exceptions\WhoopsHandler)->forDebug();
        }
    }
}
