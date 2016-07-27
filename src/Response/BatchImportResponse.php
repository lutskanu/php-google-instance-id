<?php
declare(strict_types = 1);
namespace lutskanu\GoogleInstanceId\Response;

/**
 * Class BatchImportResponse
 * @package lutskanu\GoogleInstanceId\Response
 */
class BatchImportResponse
{
    private $results = [];

    /**
     * @return array[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param array[] $results
     */
    public function setResults(array $results)
    {
        $this->results = $results;
    }
}