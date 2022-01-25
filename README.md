# Filament Excel Export

Excel Export for Resources

## Installation

You can install the package via composer:

```bash
composer require 3x1io/filament-excel
```

and now clear cache

```bash
php artisan optimize:clear
```

## Usage

it's very easy to generate export just use this command

```bash
php artisan filament:export UserResource User
```

where `UserResource` is a Resource name and `User` is a Model

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [3x1](https://github.com/3x1io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
