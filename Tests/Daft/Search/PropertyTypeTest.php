<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class PropertyTypeTest extends PHPUnit_Framework_TestCase
{
    protected $_example = array(
        '5 bed house rent',
        'Castleknock 3 bedroom apartment for sale',
        'a studio to let Dublin',
        '3 or 4 bed to sell in Dundrum for 1000 per month'
    );
    private $_object;

    public function setUp()
    {
        $this->_object = new \Daft\Search\PropertyType();
    }

    public function testGetQuery_example_0()
    {
        $this->_object->setQuery($this->_example[0]);
        $this->assertEquals('house', $this->_object->getPropertyType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_1()
    {
        $this->_object->setQuery($this->_example[1]);
        $this->assertEquals('apartment', $this->_object->getPropertyType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_2()
    {
        $this->_object->setQuery($this->_example[2]);
        $this->assertEquals('studio', $this->_object->getPropertyType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_3()
    {
        $this->_object->setQuery($this->_example[3]);
        $this->assertEquals(null, $this->_object->getPropertyType());

        $queries = $this->_object->getQuery();
        $this->assertEquals(0, count($queries));
        $this->assertInternalType('array', $queries);
        $this->assertEmpty($queries);
    }
}
