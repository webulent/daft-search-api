<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\ExternalAPI;

/**
 * Class Areas
 * @package Daft\ExternalAPI
 */
class Areas
{
    /**
     * @var Api $client Should contain a Api class
     */
    private $client;

    /**
     * Areas constructor.
     * @param Api $api for SoapClient
     */
    public function __construct(Api $api)
    {
        $this->client = $api;
    }

    /**
     * get area list from Api
     * @return \stdClass from areas response
     */
    public function getAreaList()
    {
        $params = ['api_key' => $this->client->getApiKey(), 'area_type' => "area"];

        try {
            if ($this->client->isApiAvailable()) {
                $response = $this->client->getApi()->areas($params);
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