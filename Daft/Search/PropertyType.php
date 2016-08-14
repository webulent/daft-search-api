<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Search;

/**
 * Class PropertyType
 * @package Daft\Search
 */
class PropertyType implements QueryInterface
{
    /**
     * @var array $property_type Contain property_type
     */
    private $property_type;

    /**
     * @see Patterns::$pattern      To set the pattern for this collection.
     * @var Patterns $pattern Should contain a Pattern class for get property_types array pattern house/apartment etc.
     */
    private $pattern;

    /**
     * PropertyType constructor.
     */
    public function __construct()
    {
        $pattern = new Patterns();
        $this->pattern = $pattern->getPattern('property_types');
    }

    /**
     * Returning Property Type if exist else will return empty Array
     * @return array
     */
    public function getQuery()
    {
        return array_filter(array(
            'property_type' => $this->getPropertyType()
        ));
    }

    /**
     * {@inheritdoc}
     * @return mixed
     */
    public function getPropertyType()
    {
        return $this->property_type;
    }

    /**
     * {@inheritdoc}
     * @param mixed $property_type
     */
    public function setPropertyType($property_type)
    {
        $this->property_type = $property_type;
    }

    /**
     * Finding PropertyType by given text by pattern.
     * @param $text string
     * @return $this
     */
    public function setQuery($text)
    {
        $property_type = ''; //default

        foreach ($this->pattern as $item) {
            if (strpos($text, $item) > -1) {
                $property_type = $item;
                break;
            }
        }

        $this->setPropertyType($property_type);

        return $this;
    }
}