<?php
declare(strict_types = 1);
namespace lutskanu\GoogleInstanceId\Request;

/**
 * Class BatchImportRequest
 * @package lutskanu\GoogleInstanceId\Request
 */
class BatchImportRequest
{
    private $application = '';
    private $sandbox = false;
    private $apnsTokens = [];

    public function getApplication(): string
    {
        return $this->application;
    }

    public function setApplication(string $application)
    {
        $this->application = $application;
    }

    public function isSandbox(): bool
    {
        return $this->sandbox;
    }

    public function setSandbox(bool $sandbox)
    {
        $this->sandbox = $sandbox;
    }

    public function getApnsTokens(): array
    {
        return $this->apnsTokens;
    }

    /**
     * @param string[] $apnsTokens
     */
    public function setApnsTokens(array $apnsTokens)
    {
        $this->apnsTokens = $apnsTokens;
    }
}
