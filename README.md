# Laravel API Response
[![Build Status](https://travis-ci.org/obiefy/api-response.svg?branch=master)](https://travis-ci.org/obiefy/api-response)
 ![Packagist](https://img.shields.io/packagist/l/obiefy/api-response) ![Packagist Version](https://img.shields.io/packagist/v/obiefy/api-response)

Simple and ready to use API response wrapper for Laravel.

## Features

* Simple use `return api()->ok();`
* Configurable so you can make it custom.


## Installation and Usage

First you need to install package through compose 

```$ composer require obiefy/api-response```

move config file using command

`php artisan vendor:publish --provider="Obiefy/API/APIServiceProvider"`

## How to use
1. General example
```php
use Obiefy\Facades\API;
...
public function index()
{
    $users = User::all();
    
    return API::ok('users list', $users);
}
```
this returned this json response:
```json
{
    "STATUS": 200,
    "MESSAGE": "users list",
    "DATA": [
        {"name": "user name"}
    ]
}
```

2. you can also return response using helper function
```php
public function index()
{
    $users = User::all();
    
    return api()->ok('users list', $users);
}
```

3. empty OK message `api()->ok()` will return response with status 200 and no message.
4. 404 not found message `api()->notFount('No query result')` will return response with status 404.
4. 404 with default 404 message `api()->notFount()` will return response with status 404 with default message from `config('api.messages.404')` and you can override it.


## Contributing
I will be happy if I see PR from you.

## License

The API Response is free package released under the MIT License.
