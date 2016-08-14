<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Search;

/**
 * Class Bedrooms
 * @package Daft\Search
 */
class Bedrooms implements QueryInterface
{
    /**
     * @var integer $bedrooms Contain bedrooms.
     */
    private $bedrooms;

    /**
     * @var integer $min_bedrooms Contain min-bedrooms
     */
    private $min_bedrooms;

    /**
     * @var integer $max_bedrooms Contain max-bedrooms
     */
    private $max_bedrooms;

    /**
     * @see Patterns::$pattern      To set the pattern for this collection.
     * @var Patterns $pattern Should contain a Pattern class for get bedrooms regex pattern
     */
    private $pattern;

    /**
     * Bedrooms constructor.
     */
    public function __construct()
    {
        $pattern = new Patterns();
        $this->pattern = $pattern->getPattern('bedrooms');
    }

    /**
     * Returning Bedrooms if exist else will return empty Array
     * @return array
     */
    public function getQuery()
    {
        return array_filter(array(
            'bedrooms' => $this->getBedrooms(),
            'min_bedrooms' => $this->getMinBedrooms(),
            'max_bedrooms' => $this->getMaxBedrooms()
        ));
    }

    /**
     * {@inheritdoc}
     * @return integer
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * {@inheritdoc}
     * @param integer $bedrooms
     */
    public function setBedrooms($bedrooms)
    {
        $this->bedrooms = $bedrooms;
    }

    /**
     * {@inheritdoc}
     * @return integer
     */
    public function getMinBedrooms()
    {
        return $this->min_bedrooms;
    }

    /**
     * {@inheritdoc}
     * @param integer $min_bedrooms
     */
    public function setMinBedrooms($min_bedrooms)
    {
        $this->min_bedrooms = $min_bedrooms;
    }

    /**
     * {@inheritdoc}
     * @return integer
     */
    public function getMaxBedrooms()
    {
        return $this->max_bedrooms;
    }

    /**
     * {@inheritdoc}
     * @param integer $max_bedrooms
     */
    public function setMaxBedrooms($max_bedrooms)
    {
        $this->max_bedrooms = $max_bedrooms;
    }

    /**
     * Finding Bedrooms by given text by pattern.
     * @param $text string
     * @return $this
     */
    public function setQuery($text)
    {
        preg_match_all($this->pattern, $text, $match);
        if (!empty($match['min_bedrooms'][0]) && !empty($match['max_bedrooms'][0])) {
            $this->setMaxBedrooms(trim($match['max_bedrooms'][0]));
            $this->setMinBedrooms(trim($match['min_bedrooms'][0]));
        } else if (!empty($match['bedrooms'][0])) {
            $this->setBedrooms(trim($match['bedrooms'][0]));
        }
        return $this;
    }
}