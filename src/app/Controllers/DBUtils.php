<?php

namespace app\Controllers;

use mysqli;

class DBUtils
{
    private $connection;
    private $properties;

    public function __construct(mysqli $connection, $properties)
    {
        $this->connection = $connection;
        $this->properties = $properties;
    }

    // Получение пользователя по id
    public static function getUserById(mysqli $connection, $userId)
    {
        $sql = "SELECT users.`id`, `first_name`, `last_name`, `email`, `password`, `image_path`, `image_name`, `title` 
                FROM users INNER JOIN roles ON users.role_id = roles.id 
                WHERE users.id = '$userId';";
        return self::getUser($connection, $sql);
    }

    // Получение пользователя по запросу sql
    public static function getUser(mysqli $connection, string $sql)
    {
        $result = $connection->query($sql);
        $user = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user['id'] = $row['id'];
                $user["firstName"] = $row["first_name"];
                $user["lastName"] = $row["last_name"];
                $user["email"] = $row["email"];
                $user["password"] = $row["password"];
                $user["image_path"] = $row["image_path"];
                $user["image_name"] = $row["image_name"];
                $user["role"] = $row["title"];
            }
        }

        return $user;
    }

    // Получение всех пользователей
    public static function getAllUsers(mysqli $connection)
    {
        $sql = "SELECT users.`id`, `first_name`, `last_name`, `password`, `email`, `image_path`, `image_name`, `title` 
                FROM users INNER JOIN roles ON users.role_id = roles.id 
                ORDER BY users.id;";

        $result = $connection->query($sql);
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $user = [];
            $user['id'] = $row['id'];
            $user["first_name"] = $row["first_name"];
            $user["last_name"] = $row["last_name"];
            $user["password"] = $row["password"];
            $user["email"] = $row["email"];
            $user["image_path"] = $row["image_path"];
            $user["image_name"] = $row["image_name"];
            $user["role"] = $row["title"];
            array_push($users, $user);
        }

        return $users;
    }

    // Обновление пользователя по id
    public static function updateById(mysqli $connection, $userId, string $firstName,
                                      string $lastName, string $email, string $password)
    {
        $sql = "UPDATE users SET first_name='$firstName', last_name='$lastName', email='$email', password='$password'
                WHERE id='$userId';";

        $connection->query($sql);
        return self::getUserById($connection, $userId);
    }

    // Удаление пользователя по id
    public static function deleteById(mysqli $connection, $userId)
    {
        $sql = "DELETE FROM users WHERE id='$userId'";
        return $connection->query($sql);
    }

    // Проверка возможности входа в систему
    public static function login(mysqli $connection, $email, $password)
    {
        $sql = "SELECT users.`id`, `first_name`, `last_name`, `email`, `password`, `image_path`, `image_name`, `title` 
                FROM users INNER JOIN roles ON users.role_id = roles.id 
                WHERE users.email = '$email' AND users.password = '$password';";
        return self::getUser($connection, $sql);
    }

    // Регистрация нового пользователя и отправка почты
    public function saveNewUser()
    {
        $firstName = $this->properties['firstName'];
        $lastName = $this->properties['lastName'];
        $email = $this->properties['email'];
        $password = $this->properties['password'];
        $roleId = $this->properties['role'] == 'admin' ? 1 : 2;

        // Проверка на уникальность email
        $sql = "SELECT email FROM users";

        $result = $this->connection->query($sql);

        $rows = mysqli_num_rows($result);
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            if ($row[0] == $email) {
                return false;
            }
        }

        $sql = "INSERT INTO users (first_name, last_name, email, `password`, `image_path`, `image_name`, `role_id`) 
                VALUES ('$firstName', '$lastName', '$email', '$password', 'public/images/', 'img-01.png', $roleId);";

        $result = $this->connection->query($sql);

        return $result;
    }


}