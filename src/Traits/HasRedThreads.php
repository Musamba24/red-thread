<?php

	namespace Musamba\RedThread\Traits;

	use ReflectionMethod;
	use ReflectionException;
	use Illuminate\Support\Facades\Config;
	use Musamba\RedThread\Attributes\RedThread;

	trait HasRedThreads
	{
		/**
		 * Returns an array with the methods that are recognized as relationships.
		 *
		 * @return array
		 *
		 * @throws ReflectionException
		 */
		public static function relationships(): array
		{
			$relationships = [];

			foreach (get_class_methods(static::class) as $method) {
				$reflectionMethod = new ReflectionMethod(static::class, $method);

				if (self::isRedThreaded($reflectionMethod)) {
					$relationships[$reflectionMethod->name] = $reflectionMethod->getReturnType()?->getName() ?? null;
				}
			}

			return $relationships;
		}

		/**
		 * If the package is configured to check for attributes, it will
		 * check for it otherwise it will check the return type.
		 *
		 * @param ReflectionMethod $method
		 *
		 * @return bool
		 */
		private static function isRedThreaded(ReflectionMethod $method): bool
		{
			$checkForAttribute = Config::get('red-thread.check_for_attribute', true);
			$relationshipTypes = Config::get('red-thread.relationships_types', []);

			if ($checkForAttribute) {
				return (bool)$method->getAttributes(RedThread::class);
			}

			return $method->hasReturnType() and in_array($method->getReturnType(), $relationshipTypes);
		}
	}
