<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class SearchTest extends PHPUnit_Framework_TestCase
{
    protected $_example = array(
        '5 bedroom rent',
        'Castleknock 3 bedroom for sale'
    );
    private $_object;

    public function setUp()
    {
        $this->_object = new \Daft\Search\Search();
    }

    public function testGetQuery_example_0()
    {
        $data = $this->_object->Request($this->_example[0]);

        $this->assertEquals('rental', $data['ad_type']);
        $this->assertEquals(5, $data['query']['bedrooms']);
        $this->assertInternalType('object', $data['response']);
        $this->assertInternalType('array', $data);
        $this->assertNotEmpty($data);
    }


    public function testGetQuery_example_1()
    {
        $data = $this->_object->Request($this->_example[1]);

        $this->assertEquals('sale', $data['ad_type']);
        $this->assertEquals(3, $data['query']['bedrooms']);
        $this->assertEquals(198, $data['query']['areas'][0]);
        $this->assertInternalType('object', $data['response']);
        $this->assertInternalType('array', $data);
        $this->assertNotEmpty($data);
    }
}
