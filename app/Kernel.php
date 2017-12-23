<?php

use DI\ContainerBuilder;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GuzzleHttp\Psr7\ServerRequest;

class Kernel
{

    public function handle(ServerRequestInterface $request): Response
    {
        $response = new Response();
        
        // 1) Extract uri
        $uri = $request->getUri()->getPath();
       
        if (!empty($uri) && $uri[-1] === "/") {
            return $response
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
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
                // 4) Apply middleware beforeAction
                
                return (new \Middleware\XssProtection)($request, $response, function (ServerRequest $request, Response $response) use ($route, $container) {
                    return (new \Middleware\Authorization)($request, $response, function (ServerRequest $request, Response $response) use ($route, $container) {
                        $controller = $route['_controller'];
                        $method = $route['_method'];                        
                        
                        if (!method_exists($controller, $method)) {
                            return new Response(404);
                        }                        
                        
                        return $container->get($controller)->$method($request, $response);
                    });
                });                                                
                //return $container->call([$route['_controller'], $route['_method']]);                
            }
        }
        
        // 404 Error
        return new Response(404);
    }
}

