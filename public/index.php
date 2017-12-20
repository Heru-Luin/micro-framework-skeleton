<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Model/Config/config.php';

use DI\ContainerBuilder;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Kernel
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        r((new AuthorQuery())->findPk(1)); exit;
        // 1) Extract uri
        $uri = $request->getUri()->getPath();
       
        if (!empty($uri) && $uri[-1] === "/") {
            return (new Response())
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
                
            return $response;
        }

        // 2) Configure container
        $containerBuilder= new ContainerBuilder();
        $containerBuilder->useAutowiring(true);
        $containerBuilder->addDefinitions(__DIR__ . '/../config/services.php');
        $container = $containerBuilder->build();
        
        // 3) Match routes
        $routes = include __DIR__ . '/../config/routes.php';
        foreach ($routes as $route) {
            if ($uri === $route['path']) {
                return $container->call([$route['_controller'], $route['_method']]);
            }
        }
        
        // 404 Error
        return new Response(404);
    }
}

$kernel = new Kernel();
$request = ServerRequest::fromGlobals();
$response = $kernel->handle($request);
\Http\Response\send($response);
