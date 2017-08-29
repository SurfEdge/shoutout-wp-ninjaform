<?php
/**
 * Created by IntelliJ IDEA.
 * User: asankanissanka
 * Date: 3/9/17
 * Time: 11:16 AM
 */

namespace Swagger\Client;

use Swagger\Client\Api\DefaultApi;
use Swagger\Client\ApiClient;
use Swagger\Client\Configuration;
use Swagger\Client\Model\Message;

class ShoutoutClient
{
    /**
     * API Key
     *
     * @var String
     */
    protected $authorization;

    /**
     * API Key
     *
     * @var DefaultApi
     */
    protected $apiInstance;


    /**
     * Constructor of the class
     *
     * @param String $apiKey to authenticate api calls
     * @param Boolean $debug to enable debug mode
     * @param Boolean $verifySSL to enable ssl verification
     */
    public function __construct($apiKey, $debug = false, $verifySSL = true)
    {
        $this->authorization = 'Apikey ' . $apiKey;

        $config = new Configuration();
        $config->setSSLVerification($verifySSL);
        $config->setDebug($debug);
        $this->apiInstance = new DefaultApi(new ApiClient($config));
    }

    /**
     * Send Message
     *
     * @param array $message
     *
     * @return array
     */
    public function sendMessage($message)
    {
        return $this->apiInstance->messagesPost($this->authorization, new Message($message));
    }

    /**
     * Create Contacts
     *
     * @param array $contacts
     *
     * @return array
     */
    public function createContacts($contacts)
    {
        return $this->apiInstance->contactsPost($this->authorization, $contacts);
    }

    /**
     * Create Activity
     *
     * @param array $activity
     *
     * @return array
     */
    public function createActivity($activity)
    {
        return $this->apiInstance->activitiesPost($this->authorization, $activity);
    }
}