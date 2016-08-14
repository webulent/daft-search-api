<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\ExternalAPI;

use SoapClient;

/**
 * Class Api
 * @package Daft\ExternalAPI
 */
class Api
{
    /**
     * @var string $api_url Contain URL of the API
     */
    static $api_url = 'http://api.daft.ie/v3/wsdl.xml';

    /**
     * @var string $api_key contain API key
     */
    private $api_key = 'api_key_is_here';

    /**
     * @var SoapClient $api Contain SoapClient
     */
    private $api;

    /**
     * @var bool $api_available Contain true|false for check if soapClient connected
     */
    private $api_available = false;

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->setApiClient();
    }

    /**
     * Connect to SoapClient by given $api_url
     * @return bool
     */
    private function setApiClient()
    {
        try {
            $this->api = new SoapClient(self::$api_url);
            $this->setApiAvailable(true);
            return true;
        } catch (\SoapFault $e) {
            echo 'Soap Failed: ', $e->getMessage(), "\n";
        }
        $this->setApiAvailable(false);
        return false;
    }

    /**
     * Getting public API key for use in other classes
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * Returning connected SoapClient
     * @return mixed
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * Returning True | False about SoapClient connection
     * @return boolean
     */
    public function isApiAvailable()
    {
        return $this->api_available;
    }

    /**
     * Setting True | False about SoapClient connection
     * @param boolean $api_available
     */
    public function setApiAvailable($api_available)
    {
        $this->api_available = $api_available;
    }
}