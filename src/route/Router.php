<?php

namespace route;

use app\Controllers\AuthController;
use app\Controllers\UploaderController;
use app\Controllers\UserController;
use RuntimeException;

class Router
{
    protected $method = ''; // GET || POST || PUT || DELETE
    public $requestUri = [];
    public $requestParams = [];

    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        // An array of GET parameters separated by a slash
        $this->requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->requestParams = $_REQUEST;

        // Request method definition
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE') {
                $this->method = 'DELETE';
            } else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT') {
                $this->method = 'PUT';
            } else {
                throw new Exception("Unexpected Header");
            }
        }
    }

    public function run()
    {
        if (array_shift($this->requestUri) !== 'api') {
            throw new RuntimeException('API Not Found', 404);
        }

        $request = array_shift($this->requestUri);
        $request = explode('?', $request)[0];

        switch ($request) {
            case 'login':
            {
                $controller = new AuthController($this->method, $this->requestParams);
                break;
            }
            case 'users':
            {
                $controller = new UserController($this->method, $this->requestParams);
                break;
            }
            case 'upload':
            {
                $controller = new UploaderController($this->method, $this->requestParams);
                break;
            }
            default:
            {
                $controller = new UserController($this->method, $this->requestParams);
            }
        }

        // If the method is defined in an API child class
        if (method_exists($controller, $controller->getAction($this->requestUri))) {
            return $controller->{$controller->getAction($this->requestUri)}();
        } else {
            throw new RuntimeException('Invalid Method', 405);
        }
    }
}
