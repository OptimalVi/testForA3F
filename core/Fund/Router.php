<?php

declare(strict_types=1);

namespace Core\Fund;

use Closure;
use Core\Fund\Route;
use Core\System\Facades\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @var array[Route]
     */
    protected array $routes;

    /**
     * @param string $route
     * @param array|Closure $action
     * @return void
     */
    public function get(string $route, array|Closure $action): void
    {
        $this->routes[] = new Route(
            HTTPMethods::POST,
            $route,
            $action
        );
    }

    /**
     * @param string $route
     * @param array|Closure $action
     * @return void
     */
    public function post(string $route, array|Closure $action): void
    {
        $this->routes[] = new Route(
            HTTPMethods::POST,
            $route,
            $action
        );
    }

    /**
     * @param string $url
     * @return Route
     */
    public function match(HTTPMethods $method, string $url): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->method === $method && $route->isMatched($url)) {
                return $route;
            }
        }
        return null;
    }
}
