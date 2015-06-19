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

class ParameterBag extends \Symfony\Component\HttpFoundation\ParameterBag
{
    /**
     * Get only certain attributes.
     *
     * @param string[]|string $keys,...
     *
     * @return array
     */
    public function only($keys)
    {
        $keys = is_array($keys) ? $keys : func_get_args();

        return array_only($this->parameters, $keys);
    }
}
