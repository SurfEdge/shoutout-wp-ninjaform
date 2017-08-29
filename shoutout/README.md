# ShoutOUT SDK for PHP
__version: 2.1.0__

## Requirements

PHP 5.4.0 and later

## Installation

You can install **shoutout-sdk** via composer or by downloading the source

#### Via Composer

**shoutout-sdk** is available on Packagist as the
[`shoutoutlabs/shoutout-sdk`](https://packagist.org/packages/shoutoutlabs/shoutout-sdk) package

```sh
composer require shoutoutlabs/shoutout-sdk
```

## Getting Started

Please follow the [installation Procedure](#installation) and then run the following:

#### Send Message

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Swagger\Client\ShoutoutClient;

$apiKey = 'XXXXXXXXX.XXXXXXXXX.XXXXXXXXX';

$client = new ShoutoutClient($apiKey,true,false);


$message = array(
    'source' => 'ShoutDEMO',
    'destinations' => ['94777123456'],
    'content' => array(
        'sms' => 'Sent via SMS Gateway'
    ),
    'transports' => ['SMS']
);

try {
    $result = $client->sendMessage($message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when sending message: ', $e->getMessage(), PHP_EOL;
}

?>
```

#### Create Contacts

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Swagger\Client\ShoutoutClient;

$apiKey = 'XXXXXXXXX.XXXXXXXXX.XXXXXXXXX';

$client = new ShoutoutClient($apiKey,true,false);


$contact = array(
    'mobile_number' => '94777123456',//Required if not specified user_id
    'user_id' => '94777123456',//Optional. if specified, this will be used to generate the contact id, otherwise mobile_number will be used to generate contact id
    //arbitrary attributes
    'email' => 'duke@test.com',
    'tags' => ['lead'],
    'name' => 'Duke'
);
$contacts = array($contact);

try {
    $result = $client->createContacts($contacts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when creating contacts ', $e->getMessage(), PHP_EOL;
}

?>
```

#### Create Activity

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Swagger\Client\ShoutoutClient;

$apiKey = 'XXXXXXXXX.XXXXXXXXX.XXXXXXXXX';

$client = new ShoutoutClient($apiKey,true,false);


$activity = array(
    'userId' => '94777123456',//Required. your account id
    //arbitrary attributes
    'activityName' => 'Sample Activity',
    'activityData' => array(
        'param1' => 'val1',
        'param2' => 'val2',
        'param3' => 'val3'
    )
);

try {
    $result = $client->createActivity($activity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when creating activity ', $e->getMessage(), PHP_EOL;
}

?>
```