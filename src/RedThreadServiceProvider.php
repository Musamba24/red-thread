<?php

	namespace Musamba\RedThread;

	use Illuminate\Support\ServiceProvider;

	class RedThreadServiceProvider extends ServiceProvider
	{
		/**
		 * Register any application services.
		 */
		public function register(): void
		{
			$this->mergeConfigFrom(
				__DIR__ . '/../config/red-thread.php',
				'red-thread'
			);
		}

		/**
		 * Bootstrap any package services.
		 */
		public function boot(): void
		{
			$this->publishes([
				__DIR__ . '/../config/red-thread.php' => config_path('red-thread.php'),
			]);
		}
	}
