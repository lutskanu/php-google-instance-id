<?php

namespace lutskanu\GoogleInstanceId\Tests;

class PhpIIDTestCase extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        \Mockery::close();
        parent::tearDown();
    }
}