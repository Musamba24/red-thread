# RedThread

[![Latest Version on Packagist](https://img.shields.io/packagist/v/musamba/red-thread.svg?style=flat-square)](https://packagist.org/packages/musamba/red-thread)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/musamba/red-thread/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/musamba/red-thread/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/musamba/red-thread/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/musamba/red-thread/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/musamba/red-thread.svg?style=flat-square)](https://packagist.org/packages/musamba/red-thread)

RedThread is a simple package that allows you to list your Laravel models relationships.

> The two people connected by the red thread are destined lovers, regardless of place, time, or circumstances. This
> magical cord may stretch or tangle, but never break.
* * *

## Table of Contents

<!-- TOC -->

* [Installation](#installation)
* [Usage](#usage)
* [Testing](#testing)
* [Changelog](#changelog)
* [Contributing](#contributing)
* [Security Vulnerabilities](#security-vulnerabilities)
* [Credits](#credits)
* [License](#license)

<!-- TOC -->
* * *
## Installation

You can install the package via composer:

```bash
composer require musamba/red-thread
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="red-thread"
```

This is the contents of the published config file:

```php
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
```

## Usage

You simply need to use the `HasRedThreads` trait in your model and call the `relationships` method.
Here is an example:

```php
use Musamba\RedThread\Traits\HasRedThreads;
use Musamba\RedThread\Attributes\RedThread;

class Book extends Model
{
    use HasRedThreads;
    
    // ...
    
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
    
    // ...
}
```

Calling the provided `relationships()` static method on a model instance:

```php
User::relationships();
```

An array containing all the relationships will be returned.

```php
[
    'reviews' => 'Illuminate\Database\Eloquent\Relations\HasMany',
    'author' => 'Illuminate\Database\Eloquent\Relations\BelongsTo',
]
```

If the `check_for_attribute` configuration key is set to `false`, the package will check the return type of the method,
so having a situation like this:

```php
use Musamba\RedThread\Traits\HasRedThreads;

class Book extends Model
{
    use HasRedThreads;
    
    // ...
    
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
    
    // ...
}
```

The same array as above will be returned.
## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Feel free to contribute to this package and help me to improve it. You can contribute by opening an issue or a pull
request.

## Roadmap

- [ ] Add artisan command to list relationships via CLI.

## Security Vulnerabilities

If you discover a security vulnerability within RedThread, please open an issue.

## Credits

- [Andrea Musmarra](https://github.com/Musamba24)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
