<?php

namespace Controller;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

class DemoController
{

    public function demoAction(ServerRequest $request, Response $response): Response
    {
        return $response
            ->withStatus(200)
            ->withHeader('content-type', 'application/json')
            ->withBody(\GuzzleHttp\Psr7\stream_for(json_encode([
                'method' => __FUNCTION__,
                'response_methods' => get_class_methods($response)
            ])));
    }
}
