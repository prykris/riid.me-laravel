<?php

declare(strict_types=1);

namespace Riidme\Laravel\Tests;

use Orchestra\Testbench\TestCase;
use Riidme\Laravel\RiidmeManager;
use Riidme\Laravel\RiidmeServiceProvider;

class RiidmeManagerTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [RiidmeServiceProvider::class];
    }

    public function testManagerCanBeResolved(): void
    {
        $manager = $this->app->make(RiidmeManager::class);
        
        $this->assertInstanceOf(RiidmeManager::class, $manager);
    }
} 