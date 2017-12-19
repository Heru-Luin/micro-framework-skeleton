<?php

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Psr7\ServerRequest;

$app = new \Framework\App();

$response = $app->run(ServerRequest::fromGlobals());

\Http\Response\send($response);

