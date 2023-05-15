<?php

declare(strict_types=1);

namespace Core\System\Facades;

use Closure;
use Core\Fund\HTTPMethods;
use Core\Fund\Route;
use Core\System\Facades\Router as RouterFacade;

/** 
 * @mixin RouterFacade
 */
interface RouterInterface
{

    /**
     * Regitster route with get method
     *
     * @param string $route
     * @param array|Closure $action
     * @return void
     */
    public function get(string $route, array|Closure $action): void;

    /**
     * Registration route with post method
     *
     * @param string $route
     * @param array|Closure $action
     * @return void
     */
    public function post(string $route, array|Closure $action): void;

    /**
     * Matching request ulr
     *
     * @param string $url
     * @return Route|null
     */
    public function match(HTTPMethods $method, string $url): ?Route;
}
