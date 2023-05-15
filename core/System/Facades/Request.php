<?php

declare(strict_types=1);

namespace Core\System\Facades;

use Core\System\Facades\RequestInterface;

class Request
{
    /**
     * @var RequestInterface
     */
    protected static RequestInterface $instance;

    /**
     * @return RequestInterface
     */
    public static function getInstance(): RequestInterface
    {
        return static::$instance;
    }

    /**
     * @param RequestInterface $instance
     * @return void
     */
    public static function setInstance(RequestInterface $instance): void
    {
        static::$instance = $instance;
    }
}
