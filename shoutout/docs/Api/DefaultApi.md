# Swagger\Client\DefaultApi

All URIs are relative to *https://web.getshoutout.com/v8*

Method | HTTP request | Description
------------- | ------------- | -------------
[**activitiesPost**](DefaultApi.md#activitiesPost) | **POST** /activities | 
[**contactsPost**](DefaultApi.md#contactsPost) | **POST** /contacts | 
[**messagesPost**](DefaultApi.md#messagesPost) | **POST** /messages | 


# **activitiesPost**
> \Swagger\Client\Model\Response activitiesPost($authorization, $activity)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: authorizerFunc
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\DefaultApi();
$authorization = "authorization_example"; // string | 
$activity = new \Swagger\Client\Model\Activity(); // \Swagger\Client\Model\Activity | 

try {
    $result = $api_instance->activitiesPost($authorization, $activity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->activitiesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**|  |
 **activity** | [**\Swagger\Client\Model\Activity**](../Model/\Swagger\Client\Model\Activity.md)|  |

### Return type

[**\Swagger\Client\Model\Response**](../Model/Response.md)

### Authorization

[authorizerFunc](../../README.md#authorizerFunc)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **contactsPost**
> \Swagger\Client\Model\Response contactsPost($authorization, $contacts)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: authorizerFunc
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\DefaultApi();
$authorization = "authorization_example"; // string | 
$contacts = new \Swagger\Client\Model\Contacts(); // \Swagger\Client\Model\Contacts | 

try {
    $result = $api_instance->contactsPost($authorization, $contacts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**|  |
 **contacts** | [**\Swagger\Client\Model\Contacts**](../Model/\Swagger\Client\Model\Contacts.md)|  |

### Return type

[**\Swagger\Client\Model\Response**](../Model/Response.md)

### Authorization

[authorizerFunc](../../README.md#authorizerFunc)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **messagesPost**
> \Swagger\Client\Model\MessageResponse messagesPost($authorization, $message)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: authorizerFunc
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\DefaultApi();
$authorization = "authorization_example"; // string | 
$message = new \Swagger\Client\Model\Message(); // \Swagger\Client\Model\Message | 

try {
    $result = $api_instance->messagesPost($authorization, $message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->messagesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**|  |
 **message** | [**\Swagger\Client\Model\Message**](../Model/\Swagger\Client\Model\Message.md)|  |

### Return type

[**\Swagger\Client\Model\MessageResponse**](../Model/MessageResponse.md)

### Authorization

[authorizerFunc](../../README.md#authorizerFunc)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

