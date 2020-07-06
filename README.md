# Laravel Subscriptions is a flexible plans and subscription management system for Laravel, with the required tools to run your SAAS like services efficiently.

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require vanthao03596/package-laravel-subscriptions-laravel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Vanthao03596\LaravelSubscriptions\LaravelSubscriptionsServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Vanthao03596\LaravelSubscriptions\LaravelSubscriptionsServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
$laravel-subscriptions = new Vanthao03596\LaravelSubscriptions();
echo $laravel-subscriptions->echoPhrase('Hello, Vanthao03596!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email phamthao03596@gmail.com instead of using the issue tracker.

## Credits

- [Pham Thao](https://github.com/PhamThao)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
