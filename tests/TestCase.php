<?php

	namespace Musamba\RedThread\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Musamba\RedThread\RedThreadServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

	protected function getPackageProviders($app): array
	{
        return [
			RedThreadServiceProvider::class,
        ];
    }

	public function getEnvironmentSetUp($app): void
	{
        config()->set('database.default', 'testing');
    }
}
