<?php

namespace Middleware;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;

class XContentTypeOptions
{
    public function __invoke(ServerRequest $request, Response $response)
    {
        return $response->withHeader('X-Content-Type-Options', 'nosniff');
    }
}
