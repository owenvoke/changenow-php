<?php

namespace pxgamer\ChangeNow\Traits;

use GuzzleHttp\Client;
use pxgamer\ChangeNow\ChangeNow;

/**
 * Trait ApiCallable
 */
trait ApiCallable
{
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * ApiCallable constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => ChangeNow::API_BASE_URI,
        ]);
    }

    /**
     * @param string $endpoint
     *
     * @return mixed
     */
    public function call(string $endpoint, array $query = [])
    {
        return \GuzzleHttp\json_decode(
            $this->client
                ->request('GET', $endpoint, [
                    'query' => $query
                ])
                ->getBody()
                ->getContents()
        );
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }
}
