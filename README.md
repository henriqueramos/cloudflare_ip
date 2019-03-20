# Cloudflare's Requester IP Address
Cloudflare's Requester IP Address its a Laravel Package to retrieve the real requester IP Address behind the [Cloudflare's Reverse Proxy](https://support.cloudflare.com/hc/en-us/articles/200170986-How-does-Cloudflare-handle-HTTP-Request-headers-).

## Dependencies
As part of my personal effort to everyone migrate to [Laravel 5.8](https://laravel-news.com/laravel-5-8) this package has this Laravel version as a minimum required version per default.

## Installation
Install this package in your project through [Composer](getcomposer.org). After that, let the [Laravel auto package discovery](https://laravel.com/docs/5.8/packages#package-discovery) handle everything else to allow the properly usage.

### Steps
1. Add this repository as one of your dependencies with
```bash
composer config repositories.henriqueramos_cloudflare_ip vcs https://github.com/henriqueramos/cloudflare_ip:master
```
2. Run the command `composer install` to retrieve the latest version of the code from Github.

## Usage
After installing it, the package will add a new middleware called `cloudflare_ip` into your route groups `web` and `api`.

If you want to use it in other places rather than `web`/`api` groups you can call it directly from middleware statement.

I.e:
```php
Route::put('post/{id}', function ($id) {
    //
})->middleware('cloudflare_ip');
```
## Contributing
Pull requests are extremely welcome. For major changes, please open an issue to discuss what you would like to change.

Also please, make sure to test your code properly.

## Credits
This package was based on the efforts of [molayli/laravel-cloudflare-real-ip](https://github.com/molayli/laravel-cloudflare-real-ip/) and [sumanion/laravel-cloudflare](https://github.com/sumanion/laravel-cloudflare)

## License
>Copyright 2019 Henrique Ramos
>
>Licensed under the Apache License, Version 2.0 (the "License");
>you may not use this file except in compliance with the License.
>You may obtain a copy of the License at
>
>     http://www.apache.org/licenses/LICENSE-2.0
>
>   Unless required by applicable law or agreed to in writing, software
>   distributed under the License is distributed on an "AS IS" BASIS,
>   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
>   See the License for the specific language governing permissions and
>   limitations under the License.
