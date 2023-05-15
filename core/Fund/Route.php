<?php

declare(strict_types=1);

namespace Core\Fund;

use Closure;

class Route
{

    /**
     * @var HTTPMethods
     */
    public readonly HTTPMethods $method;

    /**
     * @var string
     */
    protected string $mask;

    /**
     * Contain array with class(0), method(1)
     * Closer
     * 
     * @var array[string]|Closure
     */
    public readonly array|Closure $action;

    /**
     * Matched url params by patterns
     *
     * @var array
     */
    protected array $params = [];

    public function __construct(
        HTTPMethods $method,
        string $route,
        array $action
    ) {
        $this->method = $method;
        $this->makeMask($route);
        $this->action = $action;
    }

    public function makeMask(string $route)
    {
        $route = preg_replace('/\//', '\\/', $route); // Экранируем "/"
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route); // Замена параметра на регулярку
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route); // Замена параметра с регуляркой
        $route = '/^' . $route . '$/i';

        $this->mask = $route;
    }

    /**
     * Check matching with input url
     *
     * @param string $url
     * @return boolean
     */
    public function isMatched(string $url): bool
    {
        return (bool)preg_match($this->mask, $url, $this->params);
    }
}
