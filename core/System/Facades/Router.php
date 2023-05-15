<?php

declare(strict_types=1);

namespace Core\System\Facades;

use Closure;
use Core\Fund\HTTPMethods;
use Core\Fund\Route;

abstract class Router
{
    /**
     * @var RouterInterface
     */
    protected static RouterInterface $router;

    /**
     * @param RouterInterface $router
     * @return void
     */
    public static function setInstance(RouterInterface $router): void
    {
        static::$router = $router;
    }

    /**
     * @return RouterInterface
     */
    public static function getInstance(): RouterInterface
    {
        return static::$router;
    }

    /**
     * Register a route with post method
     *
     * @param string $route
     * @param array|Closure $action
     * @return void
     */
    public static function get(string $route, array|Closure $action)
    {
        static::$router->get($route, $action);
    }

    /**
     * Register a route with post method
     *
     * @param string $route
     * @param array|Closure $action
     * @return void
     */
    public static function post(string $route, array|Closure $action)
    {
        static::$router->post($route, $action);
    }

    /**
     * Matching routes
     *
     * @param HTTPMethods $method
     * @param string $url
     * @return Route|null
     */
    public static function match(HTTPMethods $method, string $url): ?Route
    {
        $url = preg_replace('/\?.*/', '', $url);
        return static::$router->match($method, $url);
    }
}
