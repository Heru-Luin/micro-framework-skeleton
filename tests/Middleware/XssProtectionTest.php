<?php

namespace Test\Middleware;

use PHPUnit\Framework\TestCase;

class XssProtectionTest extends TestCase
{
    public function test_xss_protection_header()
    {
        $xssProtectionMiddleware = (new \Middleware\XssProtection)(new \GuzzleHttp\Psr7\ServerRequest('GET', ''), new \GuzzleHttp\Psr7\Response);
        
        $this->assertEquals(
            $xssProtectionMiddleware->getHeader('X-XSS-Protection')[0], 
            '1; mode=block'
        );
    }
}

