<?php

return [
    [
        'path' => '/token', 
        '_controller' => Controller\TokenController::class, 
        '_method' => 'encodeAction'
    ],
    [
        'path' => '/detoken', 
        '_controller' => Controller\TokenController::class, 
        '_method' => 'decodeAction'
    ]
];

