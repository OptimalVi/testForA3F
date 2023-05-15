<?php

declare(strict_types=1);

namespace Core\System\Facades;

use Core\Fund\Route;

interface RequestInterface
{
    /**
     * Get all request parameters
     *
     * @return array
     */
    public function all(): array;

    /**
     * Get request parameter
     *
     * @param string $param
     * @return mixed
     */
    public function get(string $param): mixed;

    /**
     * Check is set parameter
     *
     * @param string $param
     * @return boolean
     */
    public function has(string $param): bool;

    /**
     * Get request's route
     *
     * @return Route
     */
    public function route(): Route;
}
