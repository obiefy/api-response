# Laravel API Response

![Build Status](https://travis-ci.org/obiefy/api-response.svg?branch=master) 
[![StyleCI](https://github.styleci.io/repos/206981157/shield?branch=master)](https://github.styleci.io/repos/206981157)
![Packagist](https://img.shields.io/packagist/l/obiefy/api-response) ![Packagist Version](https://img.shields.io/packagist/v/obiefy/api-response)

Simple Laravel API response wrapper.

---
![API response code sample](https://i.ibb.co/0r6wZPt/api-reponse.png)
---

## Installation
1. Install package through composer:
`$ composer require obiefy/api-response`

2. publish config file :
`php artisan vendor:publish --tag=api-response`

## Basic usage
Create and return JSON response:
```php
use Obiefy\API\Facades\API;
...
public function index()
{
    $users = User::all();
    
    return API::response(200,'users list', $users);
}
```

Or you can use helper function:

```php
use Obiefy\API\Facades\API;
...
public function index()
{
    $users = User::all();
    
    return api()->response(200, 'users list', $users);
}
```


## Advanced usage

####  1. General example

```php
use Obiefy\API\Facades\API;
...
public function index()
{
    $users = User::all();
    
    return API::response(200, 'users list', $users);
}
```
result:
```json
{
    "STATUS": 200,
    "MESSAGE": "users list",
    "DATA": [
        {"name": "user name"}
    ]
}
```
#### 2. Success response
```php
return api()->ok('Success message`, [
	'name' => 'Obay Hamed'
]);
```
result:
```json
{
    "STATUS": 200,
    "MESSAGE": "Success message",
    "DATA": {"name": "Obay Hamed"}
}
```
you can also return success message with out passing parametters
```php
return api()->ok();
```
in this case response message will be the default message from config file `config('api.messages.success')` the same thing for `api()->notFound()` and `api()->validation()`.

|method| default status code  | change code |  message  |   
|--|--| -- | --- |
|`ok()`|  200 |`config('api.codes.success)` | `config('api.messages.success)`
|`notFound()`|  404 |`config('api.codes.notfound)` | `config('api.messages.notfound)`
|`validation()`|  402 |`config('api.codes.validation)` | `config('api.messages.validation)`



## Contributing
I will be happy if I see PR from you.

## License

The API Response is a free package released under the MIT License.
