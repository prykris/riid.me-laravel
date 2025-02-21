<?php

declare(strict_types=1);

namespace Riidme\Laravel\Tests;

use Orchestra\Testbench\TestCase;
use Riidme\Laravel\Facades\Riidme;
use Riidme\Laravel\RiidmeServiceProvider;
use Riidme\Response\ShortenResponse;

class RiidmeTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [RiidmeServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Riidme' => Riidme::class,
        ];
    }

    public function testFacadeCanBeResolved(): void
    {
        $this->assertTrue(class_exists(Riidme::class));
    }

    public function testConfigIsLoaded(): void
    {
        $this->assertNotNull(config('riidme.base_url'));
        $this->assertNotNull(config('riidme.timeout'));
        $this->assertNotNull(config('riidme.retries'));
    }

    public function testCanMockFacade(): void
    {
        Riidme::shouldReceive('shorten')
            ->once()
            ->with('https://example.com')
            ->andReturn(new ShortenResponse('https://riid.me/abc123'));

        $result = Riidme::shorten('https://example.com');
        
        $this->assertSame('https://riid.me/abc123', $result->getShortUrl());
    }
} 