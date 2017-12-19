<?php

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Kernel
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
       
        if (!empty($uri) && $uri[-1] === "/") {
            return (new Response())
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
                
            return $response;
        }
        
        if ($uri === '/blog') {
            return new Response(200, [], '<h1>Bienvenue sur le blog</h1>');
        }
        
        return new Response(404);
    }
}

$kernel = new Kernel();
$request = ServerRequest::fromGlobals();
$response = $kernel->handle($request);
\Http\Response\send($response);

