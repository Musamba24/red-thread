<?php

	declare(strict_types=1);

	namespace Musamba\RedThread\Attributes;

	use Attribute;

	#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
	class RedThread
	{
		public function __construct() {}
	}
