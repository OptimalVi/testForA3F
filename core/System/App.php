<?php

declare(strict_types=1);

namespace Core\System;

use Closure;
use Core\Fund\HTTPMethods;
use Core\Fund\Request as FundRequest;
use Core\Fund\Router as FundRouter;
use Core\System\Facades\Request;
use Core\System\Facades\Router;
use Exception;

/**
 * 
 */
class App
{

    /**
     * @var FundRequest
     */
    protected FundRequest $request;

    /**
     * @param string $rootDir
     */
    public function __construct(
        protected string $rootDir
    ) {
        $this->routing();
        $this->request();
    }

    public function routing(): void
    {
        Router::setInstance(new FundRouter());
        require $this->rootDir . '/App/Routes/Api.php';
        $route = Router::match(
            HTTPMethods::tryFrom($_SERVER['REQUEST_METHOD']),
            $_SERVER['REQUEST_URI']
        );
        if (is_null($route)) {
            throw new \Exception("Not found route", 404);
        }

        $this->request = new FundRequest($route, $_REQUEST);
        Request::setInstance($this->request);
    }

    public function request()
    {
        $action = $this->request->route()->action;

        if ($action instanceof Closure) {
            $action();
        } else if (is_array($action)) {
            if (class_exists($action[0])) {
                $this->initController($action[0], $action[1]);
            } else {
                throw new Exception("Server error 010", 500);
            }
        }
    }

    /**
     * Init controller
     *
     * @param string $controller
     * @param string $method
     * @return void
     */
    public function initController(string $controller, string $method)
    {
        $refController = new \ReflectionClass($controller);
        $refMethod = $refController->getMethod($method);

        if ($refMethod) {
            $request = $this->request;
            if ($refParam = $refMethod->getParameters()[0] ?? null) {
                var_dump($refParam->getType()->getName());
            }
        } else {
            throw new Exception("Server error 011", 500);
        }
    }
}
