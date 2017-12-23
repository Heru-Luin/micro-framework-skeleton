<?php

namespace Middleware;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;

class Authorization
{
    public function __invoke(ServerRequest $request, Response $response, callable $next)
    {
        $credentials = base64_encode('admin:admin');
        
        if (!$request->hasHeader('Authorization')) {
            $response
                ->withStatus(403);
        }
        
        return $next($request, $response);
    }
}
