<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class AdTypesTest extends PHPUnit_Framework_TestCase
{
    private $_object;

    public function setUp()
    {
        $this->_object = $this->getMockBuilder('\Daft\ExternalAPI\AdTypes')
            ->setMethods(array('__construct', 'getAdTypes'))
            ->setConstructorArgs(array('Api'))
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetAdTypes()
    {
        $this->_object->method('getAdTypes')->willReturn($this->returnValue(new stdClass()));
        $this->assertInternalType('object', $this->_object->getAdTypes());
    }
}
