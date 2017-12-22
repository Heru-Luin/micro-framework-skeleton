<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Model/Config/config.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

use GuzzleHttp\Psr7\ServerRequest;

$kernel = new Kernel();
$request = ServerRequest::fromGlobals();
$response = $kernel->handle($request);
\Http\Response\send($response);
