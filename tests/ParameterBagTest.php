<?php
namespace Arrounded\Core;

class ParameterBagTest extends CoreTestCase
{
    public function testCanFetchOnlyCertainAttributes()
    {
        $bag = new ParameterBag(['foo' => 'bar', 'baz' => 'qux']);

        $this->assertEquals(['foo' => 'bar'], $bag->only('foo'));
    }
}
