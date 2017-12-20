<?php

namespace Service;

class Hsm
{
    private $client;
    
    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }
    
    /**
     * Returns createToken string
     *
     * @return string
     */
    public function createToken()
    {
        return 'createToken';
    }
}
