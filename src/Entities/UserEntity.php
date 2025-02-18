<?php

namespace App\Entities;

use App\configs\Database;

class UserEntity
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $created_at;
    protected $updated_at;


    public function __construct()
    {
    }


    public function setUser($id, $name, $email, $password, $created_at, $updated_at) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function __toString(): string {
        return
            "\r\n id: " . $this->id .
            "\r\n name: " . $this->name .
            "\r\n email: " . $this->email .
            "\r\n password: " . $this->password .
            "\r\n created_at: " . $this->created_at .
            "\r\n updated_at: " . $this->updated_at .
            "<br>";
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

}
