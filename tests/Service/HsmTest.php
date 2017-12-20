<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;

class HsmTest extends TestCase
{
    public function test_create_token()
    {
        $hsm = new \Service\Hsm(new \GuzzleHttp\Client());
        
        $this->assertEquals('createToken', $hsm->createToken());
    }
}

