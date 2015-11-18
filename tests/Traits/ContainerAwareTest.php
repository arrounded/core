<?php

/*
 * This file is part of Arrounded
 *
 * (c) Madewithlove <heroes@madewithlove.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arrounded\Core\Traits;

use Arrounded\Core\CoreTestCase;
use Illuminate\Container\Container;

class DummyService
{
    use ContainerAware;
}

class ContainerAwareTest extends CoreTestCase
{
    public function testCanFetchServices()
    {
        $container = new Container();
        $container['foo'] = 'bar';

        $service = new DummyService($container);
        $this->assertEquals('bar', $service->foo);
    }
}
