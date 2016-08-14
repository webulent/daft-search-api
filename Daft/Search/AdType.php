<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Search;

/**
 * Class AdType
 * @package Daft\Search
 */
class AdType implements QueryInterface
{
    /**
     * @var array $ad_type Contain ad_type
     */
    private $ad_type;

    /**
     * @see Patterns::$pattern              To set the pattern for this collection.
     * @var Patterns $pattern Should contain a Pattern class for get ad_types array pattern rental/sale
     */
    private $pattern;

    /**
     * AdType constructor.
     */
    public function __construct()
    {
        $pattern = new Patterns();
        $this->pattern = $pattern->getPattern('ad_types');
    }

    /**
     * Returning ad_type if exist else will return empty Array
     * @return array
     */
    public function getQuery()
    {
        return array_filter(array(
            'ad_type' => $this->getAdType()
        ));
    }

    /**
     * {@inheritdoc}
     * @return mixed
     */
    public function getAdType()
    {
        return $this->ad_type;
    }

    /**
     * {@inheritdoc}
     * @param mixed $ad_type
     */
    public function setAdType($ad_type)
    {
        $this->ad_type = $ad_type;
    }

    /**
     * Finding ad_type by given text by pattern.
     * @param $text string
     * @return $this
     */
    public function setQuery($text)
    {
        $ad_type = 'rental'; //default

        foreach ($this->pattern as $key => $value) {
            foreach ($value as $item) {
                if (strpos($text, $item) > -1) {
                    $ad_type = $key;
                    break;
                }
            }
        }

        $this->setAdType($ad_type);

        return $this;
    }
}