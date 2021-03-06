<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\ExternalAPI;

/**
 * Class PropertyTypes
 * @package Daft\ExternalAPI
 */
class PropertyTypes
{
    /**
     * @var Api $client Should contain a Api class
     */
    private $client;

    /**
     * PropertyTypes constructor.
     * @param Api $api for SoapClient
     */
    public function __construct(Api $api)
    {
        $this->client = $api;
    }

    /**
     * get Property Types from Api
     * @param $ad_type
     * @return \stdClass from property_types response
     */
    public function getPropertyTypes($ad_type)
    {
        $params = ['api_key' => $this->client->getApiKey(), 'ad_type' => $ad_type];

        try {
            if ($this->client->isApiAvailable()) {
                $response = $this->client->getApi()->property_types($params);
                return $response;
            }
            throw new ApiExceptions('Api is not available');
        } catch (\SoapFault $e) {
            echo 'Soap Failed: ', $e->getMessage(), "\n";
        } catch (ApiExceptions $e) {
            echo 'Api Failed: ', $e->getMessage(), "\n";
        }

        return new \stdClass();
    }
}