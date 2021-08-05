
# Livewire generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lenius/livewire-generator.svg?style=flat-square)](https://packagist.org/packages/lenius/laravel-ecommerce)
[![Build Status](https://travis-ci.org/lenius/livewire-generator.svg)](https://travis-ci.org/lenius/livewire-generator)
![tests](https://github.com/lenius/livewire-generator/workflows/tests/badge.svg?branch=main)
[![Total Downloads](https://poser.pugx.org/lenius/livewire-generator/downloads.svg)](https://packagist.org/packages/livewire-generator)
[![License](https://poser.pugx.org/lenius/livewire-generator/license.svg)](https://packagist.org/packages/Lenius/livewire-generator)

## Installation

You can install this package via composer using:

```bash
composer require lenius/livewire-generator
```

You can then export the configuration:

```bash
php artisan vendor:publish --provider="Lenius\LaravelEcommerce\EcommerceServiceProvider" --tag="config"
php artisan vendor:publish --provider="Lenius\LaravelEcommerce\EcommerceServiceProvider" --tag="views"
```

## Testing

Run the tests with:

``` bash
composer psalm
composer stan
composer test
composer test-coverage
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email info@lenius.dk
instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
