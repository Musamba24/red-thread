<?php

	namespace Musamba\RedThread;

	use Illuminate\Support\ServiceProvider;

	class RedThreadServiceProvider extends ServiceProvider
	{
		/**
		 * Register the application services.
		 */
		public function register(): void
		{
			$this->mergeConfigFrom(
				__DIR__ . '/../config/red-thread.php',
				'red-thread'
			);
		}

		/**
		 * Bootstrap the application services.
		 */
		public function boot(): void
		{
			if ($this->app->runningInConsole()) {
				$this->publishes(
					[
						__DIR__ . '/../config/red-thread.php' => config_path('red-thread.php'),
					],
					'red-thread'
				);
			}
		}
	}
