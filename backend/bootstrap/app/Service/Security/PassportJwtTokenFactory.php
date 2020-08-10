<?php


namespace App\Service\Security;


use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\Service\Error\GuzzleErrorFormatter;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class PassportJwtTokenFactory
 * @package App\Service\Security
 */
class PassportJwtTokenFactory
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $uri;
    /**
     * @var int
     */
    private $clientId;
    /**
     * @var string
     */
    private $clientSecret;
    /**
     * @var GuzzleErrorFormatter
     */
    private $errorFormatter;

    /**
     * PassportJwtTokenFactory constructor.
     * @param  ClientInterface  $client
     * @param  GuzzleErrorFormatter  $catcher
     * @param  string  $uri
     * @param  int  $clientId
     * @param  string  $clientSecret
     */
    public function __construct(ClientInterface $client, GuzzleErrorFormatter $catcher, string $uri, int $clientId, string $clientSecret)
    {
        $this->client = $client;
        $this->uri = $uri;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->errorFormatter = $catcher;
    }

    /**
     * @param  string  $username
     * @param  string  $password
     * @return string
     */
    public function getToken(string $username, string $password): string
    {
        try {
            $response = $this->client->request(
                'POST',
                $this->uri,
                [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => $this->clientId,
                        'client_secret' => $this->clientSecret,
                        'username' => $username,
                        'password' => $password,
                    ],
                ]
            );
        } catch (GuzzleException $e) {
            $problem = new Problem($e->getCode());
            $message = $this->errorFormatter->format($e->getMessage(), 'Incorrect credentials.');
            $problem->setDetail($message);
            throw new ProblemException($problem);
        }

        return $response->getBody()->getContents();
    }
}
