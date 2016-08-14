<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */
class PropertyTypesTest extends PHPUnit_Framework_TestCase
{
    private $_object;

    public function setUp()
    {
        $this->_object = $this->getMockBuilder('\Daft\ExternalAPI\PropertyTypes')
            ->setMethods(array('__construct', 'getPropertyTypes'))
            ->setConstructorArgs(array('Api'))
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetPropertyTypes()
    {
        $this->_object->method('getPropertyTypes')->willReturn($this->returnValue(new stdClass()));
        $this->assertInternalType('object', $this->_object->getPropertyTypes('house'));
    }
}
