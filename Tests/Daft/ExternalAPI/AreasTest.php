<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class AreasTest extends PHPUnit_Framework_TestCase
{
    private $_object;

    public function setUp()
    {
        $this->_object = $this->getMockBuilder('\Daft\ExternalAPI\Areas')
            ->setMethods(array('__construct', 'getAreaList'))
            ->setConstructorArgs(array('Api'))
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetAreaList()
    {
        $this->_object->method('getAreaList')->willReturn($this->returnValue(new stdClass()));
        $this->assertInternalType('object', $this->_object->getAreaList());
    }
}
