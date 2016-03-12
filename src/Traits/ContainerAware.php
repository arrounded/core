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

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Queue\Queue;
use Illuminate\Contracts\Redis\Database;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Symfony\Component\HttpFoundation\Request;

/**
 * A class using the container underneath.
 *
 * @property Guard                                     auth
 * @property Repository                                cache
 * @property \Illuminate\Contracts\Config\Repository   config
 * @property \Illuminate\Contracts\Console\Application artisan
 * @property Factory                                   cookie
 * @property DatabaseManager|Connection                db
 * @property Encrypter                                 encrypter
 * @property Dispatcher                                events
 * @property Filesystem                                files
 * @property Application                               app
 * @property Hasher                                    hash
 * @property Request                                   request
 * @property Log                                       log
 * @property Mailer                                    mailer
 * @property Paginator                                 paginator
 * @property Queue                                     queue
 * @property Database                                  redis
 * @property Redirector                                redirect
 * @property Router                                    router
 * @property UrlGenerator                              url
 * @property SessionManager|Store                      session
 * @property Translator                                translator
 * @property \Illuminate\Contracts\Validation\Factory  validator
 * @property \Illuminate\Contracts\View\Factory        view
 */
trait ContainerAware
{
    /**
     * The IoC Container.
     *
     * @var Container
     */
    protected $app;

    /**
     * Default construct for a container-based class.
     *
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Get an entry from the Container.
     *
     * @param string $key
     *
     * @return object
     */
    public function __get($key)
    {
        return $this->app->make($key);
    }

    /**
     * @return Container
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param Container $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }
}
