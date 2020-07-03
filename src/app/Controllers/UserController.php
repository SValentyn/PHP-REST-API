<?php

namespace app\Controllers;

class UserController extends BasicController
{
    public $apiName = 'users';

    /**
     * Method GET
     * Getting a list of all system users
     * URL: http://domain/users
     */
    public function index()
    {
        $connection = (new Connection())->getConnection();
        $users = DBUtils::getAllUsers($connection);
        if ($users) {
            return $this->response($users, 200);
        } else {
            return $this->response('Data not found!', 404);
        }
    }

    /**
     * Method GET
     * Getting a user by his id
     * URL: http://domain/users/{id}
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
            return $this->response('Data not found!', 404);
        }
    }

    /**
     * Method POST
     * Creates a new entity
     * URL: http://domain/users + [request parameters]
     */
    public function create()
    {
        $connection = (new Connection())->getConnection();
        $firstName = $this->requestParams['firstName'];
        $lastName = $this->requestParams['lastName'];
        $email = $this->requestParams['email'];
        $password = $this->requestParams['password'];
        $role = $this->requestParams['role'];

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
            return $this->response("Error saving data!", 500);
        }
    }

    /**
     * Method PUT
     * Updates existing user by id
     * URL: http://domain/users/{id} + [request parameters]
     */
    public function update()
    {
        $connection = (new Connection())->getConnection();
        $parse_url = parse_url($this->requestUri[0]);
        $userId = isset($parse_url['path']) ? $parse_url['path'] : null;
        // for PHP 7.0: $userId = $parse_url['path'] ?? null;

        if (!$userId || !DBUtils::getUserById($connection, $userId)) {
            return $this->response("User with id=$userId not found!", 404);
        }

        $firstName = $this->requestParams['firstName'];
        $lastName = $this->requestParams['lastName'];
        $email = $this->requestParams['email'];
        $password = $this->requestParams['password'];

        if ($user = DBUtils::updateById($connection, $userId, $firstName, $lastName, $email, $password)) {
            return $this->response($user, 200);
        } else {
            return $this->response("Error updating data!", 500);
        }
    }

    /**
     * Method DELETE
     * Deletes a user by id
     * URL: http://domain/users/{id}
     */
    public function delete()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $userId = isset($parse_url['path']) ? $parse_url['path'] : null;
        // for PHP 7.0+: $userId = $parse_url['path'] ?? null;
        $connection = (new Connection())->getConnection();

        if (!$userId || !DBUtils::getUserById($connection, $userId)) {
            return $this->response("User with id=$userId not found", 404);
        }

        if (DBUtils::deleteById($connection, $userId)) {
            return $this->response('User deleted!', 200);
        } else {
            return $this->response("Error deleting user!", 500);
        }
    }
}
