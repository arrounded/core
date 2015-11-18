<?php

/*
 * This file is part of Arrounded
 *
 * (c) Madewithlove <heroes@madewithlove.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arrounded\Core\Composers;

use Arrounded\Core\Traits\ContainerAware;

/**
 * An abstract composer class with helpers.
 */
abstract class AbstractComposer
{
    use ContainerAware;

    /**
     * Get the manifest of assets compiled by Webpack.
     *
     * @return array
     */
    protected function getWebpackAssets()
    {
        $assets = public_path('builds/manifest.json');
        $assets = file_get_contents($assets);
        $assets = json_decode($assets, true);

        return $assets;
    }

    /**
     * Make a menu from a list of links.
     *
     * @param array $menu
     *
     * @return array
     */
    protected function makeMenu($menu)
    {
        $links = [];
        foreach ($menu as $key => $item) {
            // Rebuild from associative array
            if (is_string($item)) {
                $item = [$key, $item];
            }

            list($endpoint, $label) = $item;
            $attributes = array_get($item, 4, []);

            // Compute actual URL
            $parameters = array_get($item, 2, []);
            $link = $this->router->getRoutes()->getByName($endpoint)
                ? $this->url->route($endpoint, $parameters)
                : $this->url->to($endpoint, $parameters);

            // Compute active state
            if ($link !== '#') {
                $active = array_get($item, 3) ?: str_replace($this->request->root().'/', null, $link);
                $active = $this->isOnPage($active);
            } else {
                $active = false;
            }

            $links[] = array_merge([
                'endpoint' => $link,
                'label' => $this->translate($label),
                'active' => $active ? 'active' : false,
            ], $attributes);
        }

        return $links;
    }

    /**
     * Check if a string matches the given url.
     *
     * @param string $page
     * @param bool   $loose
     *
     * @return bool
     */
    protected function isOnPage($page, $loose = true)
    {
        $page = $loose ? $page : '^'.$page.'$';
        $page = str_replace('#', '\#', $page);

        return (bool) preg_match('#'.$page.'#', $this->request->path());
    }

    /**
     * Act on a string to translate it.
     *
     * @param string $string
     *
     * @return string
     */
    protected function translate($string)
    {
        $translated = $this->app['translator']->get($string);

        return is_string($translated) ? $translated : $string;
    }
}
