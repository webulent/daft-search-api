<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Search;


use Daft\ExternalAPI\Api;
use Daft\ExternalAPI\Areas;

/**
 * Class Area
 * @package Daft\Search
 */
class Area implements QueryInterface
{
    /**
     * @var array $areas Will contain founded area_ids
     */
    private $areas;

    /**
     * Returning Areas if exist else will return empty Array
     * @return array
     */
    public function getQuery()
    {
        return array_filter(array(
            'areas' => $this->getAreas()
        ));
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * {@inheritdoc}
     * @param array $areas
     */
    public function setAreas($areas)
    {
        $this->areas = $areas;
    }


    /**
     * Finding Areas by given text.
     * @param string $text
     * @return $this
     */
    public function setQuery($text)
    {
        $text_array = explode(' ', $text);

        $areas = new Areas(new Api());
        $area_list = json_decode(json_encode($areas->getAreaList()), true);

        $items = array();
        if (isset($area_list['areas'])) {
            foreach ($text_array AS $item) {
                array_push($items, $this->findArrayByKey($area_list['areas'], 'name', ucfirst($item)));
            }
        }

        $area_ids = array();
        $items = isset(array_values(array_filter($items))[0]) ? array_values(array_filter($items))[0] : array();
        foreach ($items as $area) {
            array_push($area_ids, $area['id']);
        }

        $this->setAreas($area_ids);
        return $this;
    }

    /**
     * {@inheritdoc}
     * @param $array
     * @param $key
     * @param $value
     * @return array
     */
    private function findArrayByKey($array, $key, $value)
    {
        $results = array();
        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }

            foreach ($array as $sub_array) {
                $results = array_merge($results, $this->findArrayByKey($sub_array, $key, $value));
            }
        }
        return $results;
    }
}