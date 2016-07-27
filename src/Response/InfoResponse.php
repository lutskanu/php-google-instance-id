<?php
declare(strict_types = 1);
namespace lutskanu\GoogleInstanceId\Response;

/**
 * Class InfoResponse
 * @package lutskanu\GoogleInstanceId\Response
 */
class InfoResponse
{
    private $application = '';
    private $authorizedEntity = '';
    private $platform = '';

    public function getApplication(): string
    {
        return $this->application;
    }

    public function setApplication(string $application)
    {
        $this->application = $application;
    }

    public function getAuthorizedEntity(): string
    {
        return $this->authorizedEntity;
    }

    public function setAuthorizedEntity(string $authorizedEntity)
    {
        $this->authorizedEntity = $authorizedEntity;
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform)
    {
        $this->platform = $platform;
    }
}