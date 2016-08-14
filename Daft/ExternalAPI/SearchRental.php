<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\ExternalAPI;

/**
 * Class SearchRental
 * @package Daft\ExternalAPI
 */
class SearchRental
{
    /**
     * @var Api $client Should contain a Api class
     */
    private $client;

    /**
     * @var string $text Content of user search input
     */
    private $text;

    /**
     * @var array $queries Array of Search Classes
     */
    private $queries;

    /**
     * SearchSales constructor.
     * @param $text
     * @param Api $api for SoapClient
     */
    public function __construct($text, Api $api)
    {
        $this->client = $api;
        $this->text = $text;
    }

    /**
     * Get data from Api
     * @return \stdClass from search_rental response
     */
    public function getData()
    {
        $params = ['api_key' => $this->client->getApiKey(), 'query' => $this->getQueries()];

        try {
            if ($this->client->isApiAvailable()) {
                $response = $this->client->getApi()->search_rental($params);
                return $response->results;
            }
            throw new ApiExceptions('Api is not available');
        } catch (\SoapFault $e) {
            echo 'Soap Failed: ', $e->getMessage(), "\n";
        } catch (ApiExceptions $e) {
            echo 'Api Failed: ', $e->getMessage(), "\n";
        }

        return new \stdClass();
    }

    /**
     * Getting all founded queries
     * @return array
     */
    public function getQueries()
    {
        $queries = array();
        foreach ($this->queries as $query) {
            $queries = array_merge($queries, $query->getQuery());
        }
        return $queries;
    }

    /**
     * Setting queries from an Array that contains class of Api properties.
     * @param $queries array of Search Objects
     * @return $this
     */
    public function setQueries($queries)
    {
        $this->queries = $queries;
        foreach ($this->queries as $query) {
            $query->setQuery($this->text);
        }
        return $this;
    }


}