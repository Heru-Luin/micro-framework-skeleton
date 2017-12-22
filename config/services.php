<?php

use \DI\Container;

return [
    'db.username' => \DI\env('DB_USERNAME', 'qsdf'),
    'db.password' => \DI\env('DB_PASSWORD', 'root'),
    'db.host' => \DI\env('DB_HOST', 'localhost'),
    'db.name' => \DI\env('DB_NAME', 'micro_framework'),
    'base.uri' => \DI\env('BASE_URI', 'http://localhost:8000'),
    PDO::class => function (Container $c) {
        return new \PDO('mysql:dbname='.$c->get('db.name').';host='.$c->get('db.host'), $c->get('db.username'), $c->get('db.password'), null);
    },
    \GuzzleHttp\Client::class => function (Container $c) {
        return new \GuzzleHttp\Client(['base_uri' => $c->get('base.uri')]);
    }
];

