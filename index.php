<?php

// Include the ShoutOut SDK
require __DIR__ . '/shoutout/autoload.php';

use Swagger\Client\ShoutoutClient;

/**
 * @tag shoutout_sms
 * @callback shoutout_sms
 */
add_action( 'shoutout_sms', 'ninja_forms_processing_callback' );
/**
 * @param $form_data array
 * @return void
 */
function ninja_forms_processing_callback( $form_data ){
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

    // Few validations to be done for null values
    if($org == '')
        $org = '-';

    if($email == '')
        $email = '-';

    $form_settings = $form_data[ 'settings' ];
    $form_title    = $form_data[ 'settings' ][ 'title' ];

    $apiKey = 'INSERT_API_KEY';

    // Here the number format is converted from (077) 123-4567 to 94771234567
    // Which is needed by ShoutOut to process SMS
    $number = $mobile;
    $number = str_replace('(', '', $number);
    $number = str_replace(')', '', $number);
    $number = str_replace(' ', '', $number);
    $number = str_replace('-', '', $number);
    $number = preg_replace('/^0/', '94', $number);

    $client = new ShoutoutClient($apiKey,true,false);

    // ADDING ACTIVITY
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

    // END ACTIVITY

    // START CONTACT
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

    // END CONTACT
}


?>