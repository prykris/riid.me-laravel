<?php

declare(strict_types=1);

namespace Riidme\Laravel;

use Illuminate\Contracts\Container\Container;
use Riidme\Client;
use Riidme\Response\ShortenResponse;

class RiidmeManager
{
    private readonly Client $client;

    public function __construct(Container $app)
    {
        $this->client = Client::create([
            'base_url' => $app['config']['riidme.base_url'],
            'timeout' => $app['config']['riidme.timeout'],
            'retries' => $app['config']['riidme.retries'],
        ]);
    }

    public function shorten(string $url): ShortenResponse
    {
        return $this->client->shorten($url);
    }
} 