<?php

namespace Service;

class Crypto
{
    private $client;
    
    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }
    
    /**
     * Returns 256 sha hash
     *
     * @return string
     */
    public function createHash(string $algorithm, string $data): string
    {
        return hash($algorithm, $data);
    }
}
