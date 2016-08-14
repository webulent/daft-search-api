<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class AreaTest extends PHPUnit_Framework_TestCase
{
    protected $_example = array(
        '5 bed rent',
        'Castleknock 3 bedroom for sale',
        '3 or 4 bed house to sell in Dundrum for 1000 per month'
    );
    private $_object;

    public function setUp()
    {
        $this->_object = new \Daft\Search\Area();
    }

    public function testGetQuery_example_0()
    {
        $this->_object->setQuery($this->_example[0]);
        $this->assertInternalType('array', $this->_object->getAreas());
        $this->assertEquals(array(), $this->_object->getAreas());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertEmpty($queries);
    }

    public function testGetQuery_example_1()
    {
        $this->_object->setQuery($this->_example[1]);
        $this->assertInternalType('array', $this->_object->getAreas());
        $this->assertContains(198, $this->_object->getAreas());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertEquals(1, count($queries['areas']));
        $this->assertNotEmpty($queries);
    }

    public function testGetQuery_example_2()
    {
        $this->_object->setQuery($this->_example[2]);
        $this->assertInternalType('array', $this->_object->getAreas());
        $this->assertContains(224, $this->_object->getAreas());
        $this->assertContains(3515, $this->_object->getAreas());
        $this->assertContains(914, $this->_object->getAreas());

        $queries = $this->_object->getQuery();
        $this->assertInternalType('array', $queries);
        $this->assertEquals(3, count($queries['areas']));
        $this->assertNotEmpty($queries);
    }
}
