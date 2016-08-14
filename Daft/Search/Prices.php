<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Search;

/**
 * Class Prices
 * @package Daft\Search
 */
class Prices implements QueryInterface
{
    /**
     * @var integer $price Contain price
     */
    public $price;

    /**
     * @var integer $min_price Contain min-price
     */
    public $min_price;

    /**
     * @var integer $max_price Contain max-price
     */
    public $max_price;

    /**
     * @see Patterns::$pattern      To set the pattern for this collection.
     * @var Patterns $pattern Should contain a Pattern class for get prices regex pattern
     */
    public $pattern;

    /**
     * Prices constructor.
     */
    public function __construct()
    {
        $pattern = new Patterns();
        $this->pattern = $pattern->getPattern('price');
    }

    /**
     * Finding Prices by given text by regex pattern.
     * @param string $text
     * @return $this
     */
    public function setQuery($text)
    {
        try {
            preg_match_all($this->pattern, $text, $match);
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        if (!empty($match['min_price'][0]) && !empty($match['max_price'][0])) {
            $this->setMaxPrice(intval(trim($match['max_price'][0])));
            $this->setMinPrice(intval(trim($match['min_price'][0])));
        } elseif (!empty($match['price'][0])) {
            $this->setPrice(intval(trim($match['price'][0])));
        }

        return $this;
    }

    /**
     * Returning Prices if exist else will return empty Array
     * @return array
     */
    public function getQuery()
    {
        return array_filter(array(
            'price' => $this->getPrice(),
            'min_price' => $this->getMinPrice(),
            'max_price' => $this->getMaxPrice()
        ));
    }

    /**
     * {@inheritdoc}
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * {@inheritdoc}
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->min_price;
    }

    /**
     * {@inheritdoc}
     * @param mixed $min_price
     */
    public function setMinPrice($min_price)
    {
        $this->min_price = $min_price;
    }

    /**
     * {@inheritdoc}
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->max_price;
    }

    /**
     * {@inheritdoc}
     * @param mixed $max_price
     */
    public function setMaxPrice($max_price)
    {
        $this->max_price = $max_price;
    }


}