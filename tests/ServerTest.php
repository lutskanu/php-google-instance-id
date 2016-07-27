<?php
namespace lutskanu\GoogleInstanceId\Tests;

use lutskanu\GoogleInstanceId\Server;

class ServerTest extends PhpIIDTestCase
{
    private $fixture;

    protected function setUp()
    {
        parent::setUp();
        $this->fixture = new Server('key');
    }

    public function testGetInfo()
    {
        $apiKey = 'key';
        $resourceKey = 'grk';

        $server = new Server($apiKey);
        $result = $server->getInfo($resourceKey);
        static::assertInstanceOf('lutskanu\GoogleInstanceId\Response\InfoResponse', $result);
        static::assertNotEmpty($result->getApplication());
        static::assertNotEmpty($result->getAuthorizedEntity());
        static::assertNotEmpty($result->getPlatform());
    }

    public function testBatchImport()
    {
        $apiKey = 'key';
        $apnsTokens = ['apns_token'];

        $server = new Server($apiKey);
        $result = $server->batchImport('com.octonus.mcloud', $apnsTokens);
        static::assertInstanceOf('lutskanu\GoogleInstanceId\Response\BatchImportResponse', $result);
        static::assertNotEmpty($result->getResults());
    }
}
