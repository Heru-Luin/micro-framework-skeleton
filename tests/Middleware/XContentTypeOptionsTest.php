<?php

namespace Test\Middleware;

use PHPUnit\Framework\TestCase;

class XContentTypeOptionsTest extends TestCase
{
    public function test_x_content_type_options_header()
    {
        $xContentTypeOptionsMiddleware = (new \Middleware\XContentTypeOptions)
            (
                new \GuzzleHttp\Psr7\ServerRequest('GET', ''), 
                new \GuzzleHttp\Psr7\Response
            );
        
        $this->assertEquals(
            $xContentTypeOptionsMiddleware->getHeader('X-Content-Type-Options')[0], 
            'nosniff'
        );
    }
}

