<?php

use DI\ContainerBuilder;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Kernel
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        
        // *) Extract uri
        $uri = $request->getUri()->getPath();
       
        if (!empty($uri) && $uri[-1] === "/") {
            return $response
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
        }

        // *) Configure container
        $containerBuilder= new ContainerBuilder();
        $containerBuilder->useAutowiring(true);
        $containerBuilder->addDefinitions(__DIR__ . '/../config/services.php');
        $container = $containerBuilder->build();      
        
        // *) Match routes
        $routes = include __DIR__ . '/../config/routes.php';
        foreach ($routes as $route) {
            if ($uri === $route['path']) {
                // *) Apply middleware beforeAction
                
                $response = (new \Middleware\XssProtection)($request, $response);
                $response = (new \Middleware\XContentTypeOptions)($request, $response);
                
                $controller = $route['_controller'];
                $method = $route['_method'];
                
                if (!method_exists($controller, $method)) {
                    return new Response(404);
                }
                
                return $container->get($controller)->$method($request, $response);
                //return $container->call([$route['_controller'], $route['_method']]);
                
                // *) Apply middleware afterAction
            }
        }
        
        // 404 Error
        return new Response(404);
    }
}

