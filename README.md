[![Zhylon MegAPI Client][zhylon-megapi-image]][zhylon-megapi-edit-link]

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zhylon/megapi-client.svg?style=flat-square)](https://packagist.org/packages/zhylon/megapi-client)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/zhylon/megapi-client.svg?style=flat-square)](https://packagist.org/packages/zhylon/megapi-client)
[![Support me on Patreon](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Fshieldsio-patreon.vercel.app%2Fapi%3Fusername%3DTobymaxham%26type%3Dpatrons&style=flat)](https://patreon.com/Tobymaxham)

The **Zhylon MegAPI Client** is a Laravel wrapper for [MegAPI](https://megapi.de) API,
a platform that consolidates multiple APIs under a **single API key**.

Many developers struggle with managing multiple external APIs, each with its own authentication, documentation, and
structure. **MegAPI solves this problem** by providing a unified interface where you only need **one API key** to access
multiple services.

**Why use MegAPI?**  
 - **One API key** for all services  
 - **Centralized API interface** with a consistent structure  
 - **Seamless Laravel integration**  
 - **Flexible extension**: Register and use custom endpoints  
 - **Less authentication overhead** for multiple APIs


You are free to use this package, but please note that you need an active account
on [MegAPI](https://megapi.de) to use the service.

The MegAPI is a service by [Zhylon.net](https://id.zhylon.net/).
It includes a lot of API Endpoints to other services.
It allows you to call all those services with just one API key.

**This packages does not provide any endpoints, it's just a wrapper for the API**.


## Installation

You can install the package via Composer:

```bash
composer require zhylon/megapi-client
```


## Configuration

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Zhylon\MegapiClient\MegApiServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    'megapi' => [
        'key'      => env('MEGAPI_KEY'), // this is the key
        'endpoint' => env('MEGAPI_ENDPOINT', 'https://megapi.de/api'), // this is the endpoint
    ],
];
 ```

## Usage

To register a new endpoint to the MegAPI, you can use the following code:

```php
<?php

use Zhylon\MegapiClient\Support\Facades\MegApi;

# register a new API endpoint (we use the ServerEndpoint as example)
MegApi::register(new ServerEndpoint);

# use also could use a alias for this endpoint
MegApi::register(new ServerEndpoint, 'server');
```


After you have registered the endpoint, you can use it like this:

```php
# get all servers
MegApi::server('/servers', 12345678)
```


Your ServerEndpoint should look like this:

```php
<?php

use Zhylon\MegapiClient\MegApiEndpoint;

class ServerEndpoint implements MegApiEndpoint
{
    public function handle(MegApiClient $client, ...$parameters): mixed
    {
        // do something with the client
    }
```

So you only have to use the `MegApiEndpoint`-Interface and implement the `handle`-Method.
After that you can use the endpoint like shown above.


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Security Vulnerabilities

If you've found a bug regarding security please mail [security@zhylon.net](mailto:security@zhylon.net) instead of using the issue tracker.


## Support me

[![ko-fi](https://ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/Z8Z4NZKU)<br>
[![Support me on Patreon](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Fshieldsio-patreon.vercel.app%2Fapi%3Fusername%3DTobymaxham%26type%3Dpatrons&style=flat)](https://patreon.com/Tobymaxham)


## Credits

- [TobyMaxham](https://github.com/TobyMaxham)
- [All Contributors](../../contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[zhylon-megapi-image]: https://socialify.git.ci/zhylon/megapi-client/image?description=1&font=Raleway&issues=1&language=1&owner=1&pattern=Charlie%20Brown&pulls=1&stargazers=1&theme=Light
[zhylon-megapi-edit-link]: https://socialify.git.ci/zhylon/megapi-client?description=1&font=Raleway&issues=1&language=1&owner=1&pattern=Charlie%20Brown&pulls=1&stargazers=1&theme=Light
