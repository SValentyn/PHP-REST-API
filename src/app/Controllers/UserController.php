<?php

namespace app\Controllers;

class UserController extends BasicController
{
    public $apiName = 'users';

    /**
     * Method GET
     * List all record
     * http://domain/users
     */
    public function index()
    {
        $connection = (new Connection())->getConnection();
        $users = DBUtils::getAllUsers($connection);
        if ($users) {
            return $this->response($users, 200);
        }
        return $this->response('Data not found', 404);
    }

    /**
     * Method GET
     * View a single record by id
     * http://domain/users/1
     */
    public function view()
    {
        $connection = (new Connection())->getConnection();
        $parse_url = parse_url($this->requestUri[0]);
        $userId = isset($parse_url['path']) ? $parse_url['path'] : null;
        // for PHP 7.0: $userId = $parse_url['path'] ?? null;
        $user = DBUtils::getUserById($connection, $userId);

        if ($user) {
            return $this->response($user, 200);
        } else {
            return $this->response('Data not found', 404);
        }
    }

    /**
     * Method POST
     * Create a new record
     * http://domain/users + request parameters
     */
    public function create()
    {
        $firstName = $this->requestParams['firstName'];
        $lastName = $this->requestParams['lastName'];
        $email = $this->requestParams['email'];
        $password = $this->requestParams['password'];
        $role = $this->requestParams['role'];

        $connection = (new Connection())->getConnection();
        $user = new DBUtils($connection, [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);
        $result = $user->saveNewUser();

        if ($result) {
            return $this->response($result, 200); // true
        } else {
            return $this->response("Saving error", 500);
        }
    }

    /**
     * Method PUT
     * Updating a single record by id
     * http://domain/users/1 + request parameters
     */
    public function update()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $userId = isset($parse_url['path']) ? $parse_url['path'] : null;
        // for PHP 7.0: $userId = $parse_url['path'] ?? null;
        $connection = (new Connection())->getConnection();

        if (!$userId || !DBUtils::getUserById($connection, $userId)) {
            return $this->response("User with id=$userId not found", 404);
        }

        $firstName = $this->requestParams['firstName'];
        $lastName = $this->requestParams['lastName'];
        $email = $this->requestParams['email'];
        $password = $this->requestParams['password'];

        if ($user = DBUtils::updateById($connection, $userId, $firstName, $lastName, $email, $password)) {
            return $this->response($user, 200);
        } else {
            return $this->response("Update error", 500);
        }
    }

    /**
     * Method DELETE
     * Delete a single record by id
     * http://domain/users/1
     */
    public function delete()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $userId = isset($parse_url['path']) ? $parse_url['path'] : null;
        // for PHP 7.0: $userId = $parse_url['path'] ?? null;
        $connection = (new Connection())->getConnection();

        if (!$userId || !DBUtils::getUserById($connection, $userId)) {
            return $this->response("User with id=$userId not found", 404);
        }

        if (DBUtils::deleteById($connection, $userId)) {
            return $this->response('Data deleted', 200);
        } else {
            return $this->response("Delete error", 500);
        }
    }

}
