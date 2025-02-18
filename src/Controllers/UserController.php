<?php

namespace App\Controllers;

use App\configs\Database;
use App\Models\User;

class UserController
{
    protected User $userModel;
    public function __construct() {
        $this->userModel = new User();
    }
    public function getUsers() {
        return $this->userModel->getUsers();
    }
    public function getUser($user_id) {
        return $this->userModel->getUser($user_id);
    }
    public function createUser($name, $email, $password) {
        $this->userModel->createUser($name, $email, $password);
    }

    public function deleteUser($user_id) {
        $this->userModel->deleteUser($user_id);
    }
}
