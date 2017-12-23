<?php

namespace Test\Middleware;

use PHPUnit\Framework\TestCase;

class XssProtectionTest extends TestCase
{
    public function test_xss_protection_header()
    {
        (new \Middleware\XssProtection)
            (
                new \GuzzleHttp\Psr7\ServerRequest('GET', ''), 
                new \GuzzleHttp\Psr7\Response,
                function(\GuzzleHttp\Psr7\ServerRequest $request, \GuzzleHttp\Psr7\Response $response) {
                    $this->assertEquals(
                        $response->getHeader('X-XSS-Protection'), 
                        '1; mode=block'
                    );
                }               
            );        
    }
}

