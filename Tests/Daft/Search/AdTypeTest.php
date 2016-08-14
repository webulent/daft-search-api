<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class AdTypeTest extends PHPUnit_Framework_TestCase
{
    protected $_example = array(
        '5 bed rent',
        'Castleknock 3 bedroom for sale',
        '2 bed apartment to let Dublin',
        '3 or 4 bed house to sell in Dundrum for 1000 per month',
        'apartment in Dundrum'
    );
    private $_object;

    public function setUp()
    {
        $this->_object = new \Daft\Search\AdType();
    }

    public function testGetQuery_example_0()
    {
        $this->_object->setQuery($this->_example[0]);
        $this->assertEquals('rental', $this->_object->getAdType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_1()
    {
        $this->_object->setQuery($this->_example[1]);
        $this->assertEquals('sale', $this->_object->getAdType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_2()
    {
        $this->_object->setQuery($this->_example[2]);
        $this->assertEquals('rental', $this->_object->getAdType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_3()
    {
        $this->_object->setQuery($this->_example[3]);
        $this->assertEquals('sale', $this->_object->getAdType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_4()
    {
        $this->_object->setQuery($this->_example[4]);
        $this->assertEquals('rental', $this->_object->getAdType());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
    }
}
