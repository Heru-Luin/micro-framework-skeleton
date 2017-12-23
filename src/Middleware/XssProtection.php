<?php

namespace Middleware;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;

class XssProtection
{
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        return $response->withHeader('X-XSS-Protection', '1; mode=block');
    }
}
