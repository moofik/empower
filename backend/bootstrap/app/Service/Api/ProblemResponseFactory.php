<?php


namespace App\Service\Api;


use Illuminate\Http\JsonResponse;

class ProblemResponseFactory
{
    /**
     * @var string
     */
    private $errorsDocsUri;
    /**
     * ResponseFactory constructor.
     *
     * @param string $errorsDocsUri
     */
    public function __construct()
    {
        $this->errorsDocsUri = '';
    }

    /**
     * @param Problem $problem
     *
     * @return JsonResponse
     */
    public function create(Problem $problem): JsonResponse
    {
        $data = $problem->toArray();

        if ('about:blank' !== $data['type']) {
            $data['type'] = $this->errorsDocsUri.$data['type'];
        }

        $response = new JsonResponse($data, $problem->getStatusCode());
        $response->headers->set('Content-Type', 'application/problem+json');

        return $response;
    }
}
