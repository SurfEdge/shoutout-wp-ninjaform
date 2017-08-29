# Integrating ShoutOut SMS Gateway with Wordpress Ninja Forms

By using a WP Hook you can easily integrate the sms gateway to a wordpress site.
Using Ninja Forms on submit action listener the follwoing hook will be called.

## How to integrate

### Include the SDK

```php
// Include the ShoutOut SDK
require __DIR__ . '/shoutout/autoload.php';

use Swagger\Client\ShoutoutClient;
```

### Add the WP Hook & Write the ninja form callback function

```php
add_action( 'shoutout_sms', 'ninja_forms_processing_callback' );

function ninja_forms_processing_callback( $form_data ){
    // in the body all the validation and the requests will be handle
    // check the index.php for an example code
}
```

### Get form fields required

Check the index.php file for the complete implementation.
```php

    $form_id       = $form_data[ 'id' ];
    $form_fields   =  $form_data[ 'fields' ];
    
    foreach( $form_fields as $field ){
        $field_id    = $field[ 'id' ];
        $field_key   = $field[ 'key' ];
        $field_value = $field[ 'value' ];

        // Here you have to assign the values which will be sent to shoutout
        // The field key is coming from the form element
        switch ( $field_key ) {
            case 'name':
                $name =  $field_value;
                break;
            case 'org':
                $org =  $field_value;
                break;
            case 'email':
                $email =  $field_value;
                break;
            case 'mobile':
                $mobile =  $field_value;
                break;                         
            default:
                break;
        }
    }

```

### Use ShoutOut methods

Initialize the sdk as follows

```php
    $apiKey = 'INSERT_API_KEY';
    $client = new ShoutoutClient($apiKey,true,false);
```

1) Add new contact

```php

    $contact = array(
        'mobile_number' => $number,//Required if not specified user_id
        'user_id' => $number,
        'email' => $email,
        'tags' => ['your_tag'],
        'name' => $name,
        'university' => $org
    );

    $contacts = array($contact);
    try {
        $result = $client->createContacts($contacts);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when creating contacts ', $e->getMessage(), PHP_EOL;
    }
    
```
2) Add new Activity (Event)

```php

    $activity = array(
        'userId' => $number, //Required
        'activityName' => 'activity name',
        'activityData' => array(
            'mobile' => $number,
            'name' => $name,
            'org' => $org,
            'email' => $email // can add any custom fields here
        )
    );

    try {
        $result = $client->createActivity($activity);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when creating activity ', $e->getMessage(), PHP_EOL;
    }
    
```

### Helpers

To convert the Phone format from the form field to the supported format

```php
    // Here the number format is converted from (077) 123-4567 to 94771234567
    // Which is needed by ShoutOut to process SMS
    $number = $mobile;
    $number = str_replace('(', '', $number);
    $number = str_replace(')', '', $number);
    $number = str_replace(' ', '', $number);
    $number = str_replace('-', '', $number);
    $number = preg_replace('/^0/', '94', $number);
```


- Add screenshots
