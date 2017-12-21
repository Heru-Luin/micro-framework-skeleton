<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;

class HsmTest extends TestCase
{
    public function test_create_sha256_hash()
    {
        $crypto = new \Service\Crypto(new \GuzzleHttp\Client());
        
        $this->assertEquals(
            '020f61d1c4e647c1a5563bec87821a9c5c328292edbb782f86f34fac86039573', 
            $crypto->createHash('sha256', 'micro_framework')
        );
    }
}

