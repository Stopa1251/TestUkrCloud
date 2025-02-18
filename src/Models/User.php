<?php

namespace App\Models;

use App\configs\Database;
use App\Entities\UserEntity;

class User
{

//    private static $instance;

    private $instance;
    protected static $users;

    public function __construct() {
        $this->instance = new Database();
    }
//    public static function getInstance()
//    {
//        if (is_null(self::$instance)) {
//            self::$instance = new Database();
//        }
//        return self::$instance;
//    }

    protected static function setUsers($usersQuery) {
        self::$users = [];
        $indexOfUsers = 1;
        foreach ($usersQuery as $userQuery) {
            $userEntity = new UserEntity();
            $userEntity->setUser($userQuery['id'], $userQuery['name'], $userQuery['email'], $userQuery['password'], $userQuery['created_at'], $userQuery['updated_at']);
            self::$users[$indexOfUsers++] = $userEntity;
        }
    }

    public function getUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->instance->query($query);
        self::setUsers($result);

        return self::$users;
    }

    public function getUser($id)
    {
//        self::getInstance();
        $query = "SELECT * FROM users WHERE id = ?";
        $result = $this->instance->query($query, array($id));
        $userEntity = new UserEntity();
        $result = $result[0];
        $userEntity->setUser($result['id'], $result['name'], $result['email'], $result['password'], $result['created_at'], $result['updated_at']);
        return $userEntity;
    }


    public function createUser($name, $email, $password)
    {
        try {
//            self::getInstance();
            $query = "INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
            $this->instance->execute($query, [$name, $email, password_hash($password, PASSWORD_BCRYPT)]);

        } catch (\PDOException $exception) {
            d('PDOException: ');
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        }
    }


    public function deleteUser($user_id) {
        $query = "DELETE FROM users WHERE id = ?";
        $this->instance->execute($query, [$user_id]);
    }
    public function updateUser($id, $updatedUser) {
        $query = "UPDATE users 
          SET (name = ?, email = ?, password = ?, updated_at = NOW()) 
          WHERE id = ?";
        $this->instance->execute($query, [$updatedUser->getName(), $updatedUser->getEmail(), password_hash($updatedUser->getPassword, PASSWORD_BCRYPT), $updatedUser->getId()]);
    }
}
