<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class ApiTest extends PHPUnit_Framework_TestCase
{
    private $_object;

    public function setUp()
    {
        $this->_object = $this->getMockBuilder('\Daft\ExternalAPI\Api')
            ->setMethods(array('__construct', 'getApi', 'isApiAvailable'))
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetApiForConnectSoapClient()
    {
        $this->_object->method('getApi')->willReturn($this->returnValue(new stdClass()));
        $this->assertInternalType('object', $this->_object->getApi(), 'Called Soap Client');
    }

    public function testIsApiAvailable()
    {
        $this->_object->method('isApiAvailable')->willReturn(true);
        $this->assertTrue($this->_object->isApiAvailable(), 'Api is available');
    }
}
