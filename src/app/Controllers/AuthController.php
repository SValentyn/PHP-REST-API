<?php

namespace app\Controllers;

class AuthController extends BasicController
{
    public $apiName = 'login';

    // User login
    public function index()
    {
        $email = $this->requestParams['email'];
        $password = $this->requestParams['password'];
        $connection = (new Connection())->getConnection();
        $user = DBUtils::login($connection, $email, $password);
        return $this->response($user, 200);
    }

    protected function view()
    {
        $this->response("Action unsupported", 404);
    }

    protected function create()
    {
        $this->response("Action unsupported", 404);
    }

    protected function update()
    {
        $this->response("Action unsupported", 404);
    }

    protected function delete()
    {
        $this->response("Action unsupported", 404);
    }
}