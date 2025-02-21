# Riid.me Laravel SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/riidme/laravel.svg)](https://packagist.org/packages/riidme/laravel)
[![Tests](https://github.com/prykris/riid.me-laravel/actions/workflows/tests.yml/badge.svg)](https://github.com/prykris/riid.me-laravel/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/riidme/laravel.svg)](https://packagist.org/packages/riidme/laravel)

Laravel integration for the [riid.me](https://riid.me) URL shortener service.

## Requirements

- PHP 8.3 or higher
- Laravel 11.x

## Installation

You can install the package via composer:

```bash
composer require riidme/laravel
```

After installing, publish the configuration file:

```bash
php artisan vendor:publish --tag="riidme-config"
```

## Configuration

Add these environment variables to your `.env` file:

```env
RIIDME_API_URL=https://riid.me
RIIDME_TIMEOUT=5
RIIDME_RETRIES=3
```

## Usage

### Using the Facade

```php
use Riidme\Laravel\Facades\Riidme;

$shortUrl = Riidme::shorten('https://example.com/very/long/url');
echo $shortUrl->getShortUrl(); // https://riid.me/abc123
// or simply
echo $shortUrl; // https://riid.me/abc123
```

### Using Dependency Injection

```php
use Riidme\Laravel\RiidmeManager;

class UrlController
{
    public function __construct(
        private RiidmeManager $riidme
    ) {}

    public function shorten(Request $request)
    {
        $shortUrl = $this->riidme->shorten($request->url);
        
        return response()->json([
            'short_url' => $shortUrl->getShortUrl()
        ]);
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kristaps Drivnieks](https://github.com/prykris)
- [All Contributors](../../contributors)

## License

The Apache2 License. Please see [License File](LICENSE.md) for more information. 