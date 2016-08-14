<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class PricesTest extends PHPUnit_Framework_TestCase
{
    protected $_example = array(
        '5 bed rent',
        'Castleknock 3 bedroom for sale',
        '2 bed apartment to let Dublin',
        '3 or 4 bed house to sell in Dundrum for 1000 per month',
        'apartment for sale in Dundrum'
    );
    private $_object;

    public function setUp()
    {
        $this->_object = new \Daft\Search\Prices();
    }

    public function testGetQuery_example_0()
    {
        $this->_object->setQuery($this->_example[0]);
        $this->assertEquals(null, $this->_object->getPrice());

        $queries = $this->_object->getQuery();
        $this->assertEquals(0, count($queries));
        $this->assertInternalType('array', $queries);
        $this->assertEmpty($queries);
    }


    public function testGetQuery_example_3()
    {
        $this->_object->setQuery($this->_example[3]);
        $this->assertEquals(1000, $this->_object->getPrice());

        $queries = $this->_object->getQuery();
        $this->assertEquals(1, count($queries));
        $this->assertInternalType('array', $queries);
        $this->assertNotEmpty($queries);
        $this->assertTrue(is_int($this->_object->getPrice()));
    }

}
