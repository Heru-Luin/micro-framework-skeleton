<?php

namespace Controller;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

class TokenController
{

    public function encodeAction(\Service\Hsm $hsm): Response
    {
        return new Response(
            200,
            ['content-type' => 'application/json'],
            json_encode([
                'method' => __FUNCTION__,
                'hsm' => $hsm->createToken()
            ])
        );
    }
    
    public function decodeAction(): Response
    {
        return new Response(
            200,
            ['content-type' => 'application/json'],
            json_encode([
                'method' => __FUNCTION__
            ])
        );
    }
}
