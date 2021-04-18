# Creates a make:workflow artisan command to scaffold out a number of useful GitHub actions workflows for Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/projektgopher/laravel_workflow_generator.svg?style=flat-square)](https://packagist.org/packages/projektgopher/laravel_workflow_generator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/projektgopher/laravel_workflow_generator/run-tests?label=tests)](https://github.com/projektgopher/laravel_workflow_generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/projektgopher/laravel_workflow_generator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/projektgopher/laravel_workflow_generator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/projektgopher/laravel_workflow_generator.svg?style=flat-square)](https://packagist.org/packages/projektgopher/laravel_workflow_generator)


This adds an artisan make:workflow command to scaffold out a number of useful GitHub actions workflows for Laravel.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-laravel_workflow_generator-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-laravel_workflow_generator-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require projektgopher/laravel_workflow_generator
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Projektgopher\WorkflowGenerator\WorkflowGeneratorServiceProvider" --tag="laravel_workflow_generator-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Projektgopher\WorkflowGenerator\WorkflowGeneratorServiceProvider" --tag="laravel_workflow_generator-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel_workflow_generator = new Projektgopher\WorkflowGenerator();
echo $laravel_workflow_generator->echoPhrase('Hello, Spatie!');
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
