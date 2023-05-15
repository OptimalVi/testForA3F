<?php

namespace Core\Fund;

use Core\System\Facades\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @param array $systemRequest
     */
    public function __construct(
        protected Route $route,
        protected array $parameters = []
    ) {
    }

    /**
     * Get all request parameters
     *
     * @return array
     */
    public function all(): array
    {
        return $this->parameters;
    }

    /**
     * Get request parameter
     *
     * @param string $param
     * @return mixed
     */
    public function get(string $param): mixed
    {
        return $this->parameters[$param] ?? null;
    }

    /**
     * Check is set parameter
     *
     * @param string $param
     * @return boolean
     */
    public function has(string $param): bool
    {
        return isset($this->parameters[$param]);
    }

    /**
     * Get request's route
     *
     * @return Route
     */
    public function route(): Route
    {
        return $this->route;
    }
}
