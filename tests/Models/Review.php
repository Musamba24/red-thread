<?php

	namespace Musamba\RedThread\Tests\Models;

	use Illuminate\Database\Eloquent\Model;
	use Musamba\RedThread\Traits\HasRedThreads;
	use Musamba\RedThread\Attributes\RedThread;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class Review extends Model
	{
		use HasRedThreads;

		#[RedThread]
		public function book(): BelongsTo
		{
			return $this->belongsTo(Book::class);
		}
	}