<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\ExternalAPI;

/**
 * Class AdTypes
 * @package Daft\ExternalAPI
 */
class AdTypes
{
    /**
     * @var Api $client Should contain a Api class
     */
    private $client;

    /**
     * AdTypes constructor.
     * @param Api $api for SoapClient
     */
    public function __construct(Api $api)
    {
        $this->client = $api;
    }

    /**
     * get ad types list from Api
     * @return \stdClass from ad_types response
     */
    public function getAdTypes()
    {
        $params = ['api_key' => $this->client->getApiKey()];

        try {
            if ($this->client->isApiAvailable()) {
                $response = $this->client->getApi()->ad_types($params);
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