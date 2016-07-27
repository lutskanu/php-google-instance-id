<?php
declare(strict_types = 1);
namespace lutskanu\GoogleInstanceId;

use lutskanu\GoogleInstanceId\Request\BatchImportRequest;
use lutskanu\GoogleInstanceId\Response\BatchImportResponse;
use lutskanu\GoogleInstanceId\Response\InfoResponse;

/**
 * Class Server
 * @package lutskanu\GoogleInstanceId
 */
class Server extends AbstractIIDRequest
{
    const GOOGLE_SERVICE_IID_URL = 'https://iid.googleapis.com/iid/';

    public function getInfo(string $iidToken): InfoResponse
    {
        $response = $this->request('get', 'info/'.$iidToken);
        if ($response->getStatusCode() === 200) {
            return $this->serializer->deserialize($response->getBody()->getContents(), 'lutskanu\GoogleInstanceId\Response\InfoResponse', 'json');
        }

        throw new \LogicException('Unable to deserialize return value');
    }

    public function batchImport(string $application, array $apnsTokens): BatchImportResponse
    {
        $batchImportRequest = new BatchImportRequest();
        $batchImportRequest->setApplication($application);
        $batchImportRequest->setApnsTokens($apnsTokens);
        $requestBody = $this->serializer->serialize($batchImportRequest, 'json');
        $response = $this->request('post', 'v1:batchImport', (string)$requestBody);

        return $this->serializer->deserialize($response, 'lutskanu\GoogleInstanceId\Response\BatchImportResponse', 'json');
    }

    protected function getServiceUri():string
    {
        return self::GOOGLE_SERVICE_IID_URL;
    }
}