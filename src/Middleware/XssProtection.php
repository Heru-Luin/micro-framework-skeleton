<?php

namespace Middleware;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;

class XssProtection
{
    public function __invoke(ServerRequest $request, Response $response, callable $next)
    {
        $response->withHeader('X-XSS-Protection', '1; mode=block');        
        
        return $next($request, $response);
    }
}
