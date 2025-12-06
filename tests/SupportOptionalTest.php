<?php

namespace Tests;

use Nacosvel\Support\HigherOrderProxy;
use PHPUnit\Framework\TestCase;
use stdClass;

class SupportOptionalTest extends TestCase
{
    public function testGetExistItemOnObject()
    {
        $expected = 'test';

        $targetObj       = new stdClass;
        $targetObj->item = $expected;

        $optional = new HigherOrderProxy($targetObj);

        $this->assertEquals($expected, $optional->item);
    }

    public function testGetNotExistItemOnObject()
    {
        $targetObj = new stdClass;

        $optional = new HigherOrderProxy($targetObj);

        $this->assertNull($optional->item);
    }

    public function testIssetExistItemOnObject()
    {
        $targetObj       = new stdClass;
        $targetObj->item = '';

        $optional = new HigherOrderProxy($targetObj);

        $this->assertTrue(isset($optional->item));
    }

    public function testIssetNotExistItemOnObject()
    {
        $targetObj = new stdClass;

        $optional = new HigherOrderProxy($targetObj);

        $this->assertFalse(isset($optional->item));
    }

    public function testGetExistItemOnArray()
    {
        $expected = 'test';

        $targetArr = [
            'item' => $expected,
        ];

        $optional = new HigherOrderProxy($targetArr);

        $this->assertEquals($expected, $optional['item']);
    }

    public function testGetNotExistItemOnArray()
    {
        $targetObj = [];

        $optional = new HigherOrderProxy($targetObj);

        $this->assertNull($optional['item']);
    }

    public function testIssetExistItemOnArray()
    {
        $targetArr = [
            'item' => '',
        ];

        $optional = new HigherOrderProxy($targetArr);

        $this->assertTrue(isset($optional['item']));
        $this->assertTrue(isset($optional->item));
    }

    public function testIssetNotExistItemOnArray()
    {
        $targetArr = [];

        $optional = new HigherOrderProxy($targetArr);

        $this->assertFalse(isset($optional['item']));
        $this->assertFalse(isset($optional->item));
    }

    public function testIssetExistItemOnNull()
    {
        $targetNull = null;

        $optional = new HigherOrderProxy($targetNull);

        $this->assertFalse(isset($optional->item));
    }

    public function testIssetExistItemOnArrayObject()
    {
        $expected   = 'test';
        $targetNull = new \ArrayObject([
            'item' => $expected,
        ]);

        $optional = new HigherOrderProxy($targetNull);

        // $this->assertTrue(isset($optional->item));
        $this->assertTrue(isset($optional['item']));

        // $this->assertEquals($expected, $optional->item);
        $this->assertEquals($expected, $optional['item']);
    }

    public function testIssetExistItemOnArrayObjectAsProps()
    {
        $expected   = 'test';
        $targetNull = new \ArrayObject([
            'item' => $expected,
        ], \ArrayObject::ARRAY_AS_PROPS);

        $optional = new HigherOrderProxy($targetNull);

        $this->assertTrue(isset($optional->item));
        $this->assertTrue(isset($optional['item']));

        $this->assertEquals($expected, $optional->item);
        $this->assertEquals($expected, $optional['item']);
    }

    public function testIssetExistItemOnArrayObjectAsList()
    {
        $expected   = 'test';
        $targetNull = new \ArrayObject([
            'item' => $expected,
        ], \ArrayObject::STD_PROP_LIST);

        $optional = new HigherOrderProxy($targetNull);

        // $this->assertTrue(isset($optional->item));
        $this->assertTrue(isset($optional['item']));

        // $this->assertEquals($expected, $optional->item);
        $this->assertEquals($expected, $optional['item']);
    }
}
