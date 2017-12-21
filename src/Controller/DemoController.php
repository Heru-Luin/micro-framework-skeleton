<?php

namespace Controller;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

class DemoController
{

    public function demoAction(\Service\Crypto $crypto, \Model\User $user): Response
    {
        return new Response(
            200,
            ['content-type' => 'application/json'],
            json_encode([
                'method' => __FUNCTION__,
                'hash' => $crypto->createHash('sha256', 'micro_framework')
            ])
        );
    }
}
