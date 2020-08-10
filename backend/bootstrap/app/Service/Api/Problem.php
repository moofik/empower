<?php


namespace App\Service\Api;


use Symfony\Component\HttpFoundation\Response;

class Problem
{
    public const TYPE_VALIDATION_ERROR = 'validation_error';
    public const TYPE_INVALID_REQUEST_BODY_FORMAT = 'invalid_request_body_format';
    public const TYPE_SERVER_DATABASE_ERROR = 'server_database_error';
    public const TYPE_SERVER_SERIALIZATION_ERROR = 'server_serialization_error';
    private const ERROR_TITLES = [
        self::TYPE_VALIDATION_ERROR => 'There is a validation error',
        self::TYPE_INVALID_REQUEST_BODY_FORMAT => 'Invalid request body format',
        self::TYPE_SERVER_DATABASE_ERROR => 'There is a database error on server',
        self::TYPE_SERVER_SERIALIZATION_ERROR => 'There is a serialization error on server',
    ];

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $extraData = [];

    /**
     * ApiProblem constructor.
     *
     * @param  int  $statusCode
     * @param  string  $type
     */
    public function __construct(int $statusCode, string $type = 'about:blank')
    {
        $this->statusCode = $statusCode;
        $this->type = $type;
        if ($type === 'about:blank') {
            $this->title = isset(Response::$statusTexts[$statusCode])
                ? Response::$statusTexts[$statusCode]
                : 'Unknown status code';
        } else {
            if (!isset(self::ERROR_TITLES[$type])) {
                throw new \InvalidArgumentException('No title for type '.$type);
            }
            $this->title = self::ERROR_TITLES[$type];
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(
            $this->extraData,
            [
                'status' => $this->statusCode,
                'type' => $this->type,
                'title' => $this->title,
            ]
        );
    }

    /**
     * @param  string  $name
     * @param $value
     */
    public function set(string $name, $value): void
    {
        $this->extraData[$name] = $value;
    }

    /**
     * @param $value
     */
    public function setDetail($value): void
    {
        /** Error bag for frontend is always represented array of arrays */
        if (is_string($value)) {
            $value = [[$value]];
        }

        $this->extraData['detail'] = $value;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
