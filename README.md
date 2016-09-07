# php-sdk

Official PHP SDK for [ma-residence](https://www.ma-residence.fr)'s API.

# Get started

To use [ma-residence's API](https://github.com/ma-residence/api), you have to register your application. When registering your application, you will obtain a ***client_id*** and ***client_secret***. 
The ***client_id*** and ***client_secret*** will be necessary to use the API.

## Installation

Edit your `composer.json` :

```json
{
    "require": {
        "ma-residence/php-sdk": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:ma-residence/php-sdk.git",
            "no-api": true
        }
    ]
}
```

And don't forget to run:

    $ composer update

## Usage

```php
<?php

use MR\SDK\Client;

$host = 'https://api.ma-residence.fr/';
$clientId = 'CLIENT_ID';
$clientSecret = 'CLIENT_SECRET';

$mrClient = new Client($host, $clientId, $clientSecret);
```

After you have initialized the class, you can login with an email and password :

```php
$mrClient->auth()->loginWithCredentials('developpeur@ma-residence.fr', 'password');
```

Or with an external token (after login with facebook for example) :

```php
$mrClient->auth()->loginWithExternalToken('facebook', 'FACEBOOK_ACCESS_TOKEN');
```

And if you want to logout to do some requests anonymously, do the following :

```php
$mrClient->auth()->logout();
```

## Endpoints

```php
$mrClient->myEndpoint()->foo();
```

Available endpoints:

 - NONE