# Laravel workflow generator
[![Latest Version on Packagist](https://img.shields.io/packagist/v/projektgopher/laravel-workflow-generator.svg?style=flat-square)](https://packagist.org/packages/projektgopher/laravel-workflow-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ProjektGopher/Laravel-workflow-generator/run-tests?label=tests)](https://github.com/ProjektGopher/Laravel-workflow-generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ProjektGopher/Laravel-workflow-generator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ProjektGopher/Laravel-workflow-generator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/projektgopher/laravel-workflow-generator.svg?style=flat-square)](https://packagist.org/packages/projektgopher/laravel-workflow-generator)


This creates a make:workflow artisan command to scaffold out a number of useful GitHub actions workflows for Laravel.

## Installation

You can install the package via composer:

```bash
composer require projektgopher/laravel-workflow-generator
```

You can publish and run the migrations with:

You can publish the config file with:
```bash
php artisan vendor:publish --provider="ProjektGopher\WorkflowGenerator\WorkflowGeneratorServiceProvider" --tag="Laravel-workflow-generator-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
php artisan workflow:make dusk --force
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Len Woodward](https://github.com/ProjektGopher)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
