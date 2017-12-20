<?php

use \DI\Container;

return [
    'db.username' => \DI\env('db_username', 'root'),
    'db.password' => \DI\env('db_password', 'root'),
    'db.host' => \DI\env('db_host', 'localhost'),
    'db.name' => \DI\env('db_name', 'token'),
    'base.uri' => \DI\env('base_uri', 'http://localhost:8000'),
    PDO::class => function (Container $c) {
        return new \PDO('mysql:dbname='.$c->get('db.name').';host='.$c->get('db.host'), $c->get('db.username'), $c->get('db.password'), null);
    },
    \GuzzleHttp\Client::class => function (Container $c) {
        return new \GuzzleHttp\Client(['base_uri' => $c->get('base.uri')]);
    }
];

