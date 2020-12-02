# PHP-FCM-Client

A Simple PHP Library for sending FCM (Firebase Cloud Messages)

## Requirement

- `PHP` >= 7.0
- `Composer` as package manager

## Installation

```bash
composer require nasrul21/php-fcm-client
```

## Quickstart
```php
<?php

// load composer
require 'vendor/autoload.php';

// set api key
$apiKey = "..." // your fcm api key

// initialize FCMClinet with apiKey as params
$fcm = new FCMClient($apiKey);

$registration_ids = ["...", "..."];
$title = "Hello!";
$body = "This is the body";

// send fcm notifications
$fcm->send($registration_ids, $title, $body);
```

## License
[MIT](LICENSE.md)