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
		 *
		 * @throws ReflectionException
		 */
		public static function relationships(): array
		{
			$relationships = [];

			foreach (get_class_methods(static::class) as $method) {
				$reflectionMethod = new ReflectionMethod(static::class, $method);

				if (self::isRedThreaded($reflectionMethod)) {
					$returnType          = $reflectionMethod->getReturnType()?->getName() ?? null;
					$returnFullNamespace = Config::get('red-thread.full_namespace', true);

					if (!$returnFullNamespace) {
						$returnType = class_basename($returnType);
					}

					$relationships[$reflectionMethod->name] = $returnType;
				}
			}

			return $relationships;
		}

		/**
		 * If the package is configured to check for attributes, it will
		 * check for it otherwise it will check the return type.
		 */
		private static function isRedThreaded(ReflectionMethod $method): bool
		{
			$checkForAttribute = Config::get('red-thread.check_for_attribute', true);
			$relationshipTypes = Config::get('red-thread.relationship_types', []);

			if ($checkForAttribute) {
				return (bool)$method->getAttributes(RedThread::class);
			}

			return $method->hasReturnType() and in_array($method->getReturnType()->getName(), $relationshipTypes);
		}
	}
