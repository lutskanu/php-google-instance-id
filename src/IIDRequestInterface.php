<?php
declare(strict_types = 1);
namespace lutskanu\GoogleInstanceId;

use GuzzleHttp\ClientInterface;

interface IIDRequestInterface
{
    public function setGuzzleClient(ClientInterface $client): IIDRequestInterface;

    public function getGuzzleClient(): ClientInterface;
}