<?php

/*
 * This file is part of Arrounded
 *
 * (c) Madewithlove <heroes@madewithlove.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arrounded\Core;

class ParameterBagTest extends CoreTestCase
{
    public function testCanFetchOnlyCertainAttributes()
    {
        $bag = new ParameterBag(['foo' => 'bar', 'baz' => 'qux']);

        $this->assertEquals(['foo' => 'bar'], $bag->only('foo'));
    }
}
