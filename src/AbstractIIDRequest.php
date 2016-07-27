<?php
declare(strict_types = 1);
namespace lutskanu\GoogleInstanceId;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class AbstractIIDRequest
 * @package lutskanu\GoogleInstanceId
 */
abstract class AbstractIIDRequest implements IIDRequestInterface
{
    /** @var ClientInterface */
    protected $guzzleClient;

    /** @var string */
    protected $authKey;

    /** @var Serializer */
    protected $serializer;

    abstract protected function getServiceUri():string;

    public function __construct($authKey)
    {
        $this->authKey = $authKey;
        $normalizer =new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $this->serializer = new Serializer([$normalizer], [new JsonEncoder()]);
    }

    public function setGuzzleClient(ClientInterface $client): IIDRequestInterface
    {
        $this->guzzleClient = $client;

        return $this;
    }

    public function getGuzzleClient(): ClientInterface
    {
        if (!$this->guzzleClient instanceof ClientInterface) {
            $this->guzzleClient = new Client();
        }

        return $this->guzzleClient;
    }

    public function request(string $method, string $relResourcePath, string $body = null): ResponseInterface
    {
        $uri = $this->getServiceUri().$relResourcePath;
        $headers = [
            'Authorization' => sprintf('key=%s', $this->authKey),
            'Content-Type' => 'application/json',
        ];

        $request = new Request($method, $uri, $headers, $body);

        return $this->getGuzzleClient()->send($request);
    }
}