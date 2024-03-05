<?php

	namespace Musamba\RedThread\Tests\Models;

	use Illuminate\Database\Eloquent\Model;
	use Musamba\RedThread\Traits\HasRedThreads;
	use Musamba\RedThread\Attributes\RedThread;
	use Illuminate\Database\Eloquent\Relations\HasMany;

	class Author extends Model
	{
		use HasRedThreads;

		#[RedThread]
		public function books(): HasMany
		{
			return $this->hasMany(Book::class);
		}
	}