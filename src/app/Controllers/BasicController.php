<?php

namespace app\Controllers;

abstract class BasicController
{

    public $apiName = '';
    protected $method = ''; // GET|POST|PUT|DELETE
    public $requestParams = [];
    public $requestUri = [];

    public function __construct($method, $requestParams)
    {
        $this->method = $method;
        $this->requestParams = $requestParams;
    }

    public function getAction($params = '')
    {
        $method = $this->method;
        $this->requestUri = $params;
        switch ($method) {
            case 'GET':
                if ($params) {
                    return 'view';
                } else {
                    return 'index';
                }
                break;
            case 'POST':
                return 'create';
                break;
            case 'PUT':
                return 'update';
                break;
            case 'DELETE':
                return 'delete';
                break;
            default:
                return null;
        }
    }

    protected function response($data, $status = 500)
    {
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data);
    }

    private function requestStatus($code)
    {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code]) ? $status[$code] : $status[500];
    }

    abstract protected function index();

    abstract protected function view();

    abstract protected function create();

    abstract protected function update();

    abstract protected function delete();
}