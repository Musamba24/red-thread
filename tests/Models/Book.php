<?php

	namespace Musamba\RedThread\Tests\Models;

	use Illuminate\Database\Eloquent\Model;
	use Musamba\RedThread\Traits\HasRedThreads;
	use Musamba\RedThread\Attributes\RedThread;
	use Illuminate\Database\Eloquent\Relations\HasMany;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class Book extends Model
	{
		use HasRedThreads;

		#[RedThread]
		public function reviews(): HasMany
		{
			return $this->hasMany(Review::class);
		}

		#[RedThread]
		public function author(): BelongsTo
		{
			return $this->belongsTo(Author::class);
		}
	}