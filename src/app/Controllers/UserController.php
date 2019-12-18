<?php

namespace app\Controllers;

class UserController extends BasicController
{
    public $apiName = 'users';

    /**
     * Метод GET
     * Вывод списка всех записей
     * http://ДОМЕН/users
     * @return string
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
     * Метод GET
     * Просмотр отдельной записи (по id)
     * http://ДОМЕН/users/1
     * @return string
     */
    public function view()
    {
        $connection = (new Connection())->getConnection();
        $parse_url = parse_url($this->requestUri[0]);
        $userId = $parse_url['path'] ?? null;
        $user = DBUtils::getUserById($connection, $userId);

        if ($user) {
            return $this->response($user, 200);
        } else {
            return $this->response('Data not found', 404);
        }
    }

    /**
     * Метод POST
     * Создание новой записи
     * http://ДОМЕН/users + параметры запроса name, email
     * @return string
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
     * Метод PUT
     * Обновление отдельной записи по id
     * http://ДОМЕН/users/1 + параметры запроса
     * @return string
     */
    public function update()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $userId = $parse_url['path'] ?? null;

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
     * Метод DELETE
     * Удаление отдельной записи по id
     * http://ДОМЕН/users/1
     * @return string
     */
    public function delete()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $userId = $parse_url['path'] ?? null;

        $connection = (new Connection())->getConnection();

        if (!$userId || !DBUtils::getUserById($connection, $userId)) {
            return $this->response("User with id=$userId not found", 404);
        }

        if (DBUtils::deleteById($connection, $userId)) {
            return $this->response('Data deleted.', 200);
        } else {
            return $this->response("Delete error", 500);
        }
    }

    //    /**
//     * Метод GET
//     * Загрузка фото отдельной записи по id
//     * http://ДОМЕН/users/1
//     * @return string
//     */
//    public function upload()
//    {
//        $parse_url = parse_url($this->requestUri[0]);
//        $userId = $parse_url['path'] ?? null;
//
//        $connection = (new Connection())->getConnection();
//
//        if (!$userId || !DBUtils::getUserById($connection, $userId)) {
//            return $this->response("User with id=$userId not found", 404);
//        }
//
//        $image_path = $this->requestParams['image_path'];
//        $image_name = $this->requestParams['image_name'];
//
//        if ($user = DBUtils::uploadById($connection, $userId, $image_path, $image_name)) {
//            return $this->response($user, 200);
//        } else {
//            return $this->response("Upload error", 500);
//        }
//    }

}