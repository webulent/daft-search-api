<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Search;


use Daft\ExternalAPI\Api;
use Daft\ExternalAPI\SearchRental;
use Daft\ExternalAPI\SearchSales;

/**
 * Class Search
 * @package Daft\Search
 */
class Search
{

    /**
     * Using External API classes for return response data.
     * @param $text
     * @return array
     */
    public function Request($text)
    {
        $ad_type = new AdType();
        $ad_type->setQuery($text);

        if ($ad_type->getAdType() == 'rental') {
            $search = new SearchRental($text, new Api());
        } else {
            $search = new SearchSales($text, new Api());
        }

        $array = [
            new Bedrooms(),
            new Prices(),
            new PropertyType(),
            new Area()
        ];

        $search->setQueries($array);

        $data = array(
            'ad_type' => $ad_type->getAdType(),
            'query' => $search->getQueries(),
            'response' => $search->getData()
        );

        return $data;
    }
}