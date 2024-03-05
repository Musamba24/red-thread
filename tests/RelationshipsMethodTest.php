<?php

	use Illuminate\Support\Facades\Config;
	use Musamba\RedThread\Tests\Models\Book;
	use Musamba\RedThread\Tests\Models\Author;
	use Musamba\RedThread\Tests\Models\Review;

	it(
		'can list models relationships with full qualified class name using attribute',
		function() {
			// Set the full namespace setting to true
			Config::set('red-thread.full_namespace', true);

			// Set the check for attribute setting to true
			Config::set('red-thread.check_for_attribute', true);

			// Book model tests
			$bookRelationships = Book::relationships();

			expect($bookRelationships)
				->toBeArray()
				->toHaveKeys([
					'reviews',
					'author',
				])
				->and($bookRelationships['reviews'])
				->toBe('Illuminate\Database\Eloquent\Relations\HasMany');

			// Author model tests
			$authorRelationship = Author::relationships();

			expect($authorRelationship)
				->toBeArray()
				->toHaveKey('books')
				->and($authorRelationship['books'])
				->toBe('Illuminate\Database\Eloquent\Relations\HasMany');

			// Review model tests
			$reviewRelationship = Review::relationships();

			expect($reviewRelationship)
				->toBeArray()
				->toHaveKey('book')
				->and($reviewRelationship['book'])
				->toBe('Illuminate\Database\Eloquent\Relations\BelongsTo');
		}
	);

	it(
		'can list models relationships with class base name using attribute',
		function() {
			// Set the full namespace setting to false
			Config::set('red-thread.full_namespace', false);

			// Set the check for attribute setting to true
			Config::set('red-thread.check_for_attribute', true);

			// Book model tests
			$bookRelationships = Book::relationships();

			expect($bookRelationships)
				->toBeArray()
				->toHaveKeys([
					'reviews',
					'author',
				])
				->and($bookRelationships['reviews'])
				->toBe('HasMany');

			// Author model tests
			$authorRelationship = Author::relationships();

			expect($authorRelationship)
				->toBeArray()
				->toHaveKey('books')
				->and($authorRelationship['books'])
				->toBe('HasMany');

			// Review model tests
			$reviewRelationship = Review::relationships();

			expect($reviewRelationship)
				->toBeArray()
				->toHaveKey('book')
				->and($reviewRelationship['book'])
				->toBe('BelongsTo');
		}
	);

	it(
		'can list models relationships with full qualified class name using the return type',
		function() {
			// Set the full namespace setting to true
			Config::set('red-thread.full_namespace', true);

			// Set the check for attribute setting to false
			Config::set('red-thread.check_for_attribute', false);

			// Book model tests
			$bookRelationships = Book::relationships();

			expect($bookRelationships)
				->toBeArray()
				->toHaveKeys([
					'reviews',
					'author',
				])
				->and($bookRelationships['reviews'])
				->toBe('Illuminate\Database\Eloquent\Relations\HasMany');

			// Author model tests
			$authorRelationship = Author::relationships();

			expect($authorRelationship)
				->toBeArray()
				->toHaveKey('books')
				->and($authorRelationship['books'])
				->toBe('Illuminate\Database\Eloquent\Relations\HasMany');

			// Review model tests
			$reviewRelationship = Review::relationships();

			expect($reviewRelationship)
				->toBeArray()
				->toHaveKey('book')
				->and($reviewRelationship['book'])
				->toBe('Illuminate\Database\Eloquent\Relations\BelongsTo');
		}
	);

	it(
		'can list models relationships with class base name using the return type',
		function() {
			// Set the full namespace setting to true
			Config::set('red-thread.full_namespace', false);

			// Set the check for attribute setting to false
			Config::set('red-thread.check_for_attribute', false);

			// Book model tests
			$bookRelationships = Book::relationships();

			expect($bookRelationships)
				->toBeArray()
				->toHaveKeys([
					'reviews',
					'author',
				])
				->and($bookRelationships['reviews'])
				->toBe('HasMany');

			// Author model tests
			$authorRelationship = Author::relationships();

			expect($authorRelationship)
				->toBeArray()
				->toHaveKey('books')
				->and($authorRelationship['books'])
				->toBe('HasMany');

			// Review model tests
			$reviewRelationship = Review::relationships();

			expect($reviewRelationship)
				->toBeArray()
				->toHaveKey('book')
				->and($reviewRelationship['book'])
				->toBe('BelongsTo');
		}
	);