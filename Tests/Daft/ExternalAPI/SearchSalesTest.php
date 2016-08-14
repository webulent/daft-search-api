<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class SearchSalesTest extends PHPUnit_Framework_TestCase
{
    private $_object;

    public function setUp()
    {
        $text = '3 or 4 bed house sale in Dundrum for 1000 per month';

        $this->_object = $this->getMockBuilder('\Daft\ExternalAPI\SearchSale')
            ->setMethods(array('__construct', 'getQueries', 'getData'))
            ->setConstructorArgs(array($text,'Api'))
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetQueries()
    {
        $this->_object->method('getQueries')->willReturn(array());
        $this->assertInternalType('array', $this->_object->getQueries());
    }

    public function testGetData()
    {
        $this->_object->method('getData')->willReturn($this->returnValue(new stdClass()));
        $this->assertInternalType('object', $this->_object->getData(), 'stdClass from Soap API');
    }
}
