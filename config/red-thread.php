<?php

	return [

		/*
		|--------------------------------------------------------------------------
		| Check for attribute
		|--------------------------------------------------------------------------
		|
		| This value indicates whether to check the attribute "#[RedThread]"
		| used to mark a method as relationship or not. If set to "false"
		| the package will check the return type of the method.
		|
		*/

		'check_for_attribute' => true,

		/*
		|--------------------------------------------------------------------------
		| Relationships types
		|--------------------------------------------------------------------------
		|
		| This array contains all relationship types.
		|
		*/

		'relationship_types' => [
			Illuminate\Database\Eloquent\Relations\HasOne::class,
			Illuminate\Database\Eloquent\Relations\HasMany::class,
			Illuminate\Database\Eloquent\Relations\MorphTo::class,
			Illuminate\Database\Eloquent\Relations\MorphOne::class,
			Illuminate\Database\Eloquent\Relations\MorphMany::class,
			Illuminate\Database\Eloquent\Relations\BelongsTo::class,
			Illuminate\Database\Eloquent\Relations\MorphToMany::class,
			Illuminate\Database\Eloquent\Relations\HasOneThrough::class,
			Illuminate\Database\Eloquent\Relations\BelongsToMany::class,
			Illuminate\Database\Eloquent\Relations\HasManyThrough::class,
		],

	];
