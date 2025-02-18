<?php

namespace App\Entities;

use App\configs\Database;

class PostEntity
{
    protected $id;
    protected $title;
    protected $content;
    protected $user_id;
    protected $created_at;
    protected $updated_at;

    public function __construct()
    {
    }

    public function setPost($id, $title, $content, $user_id, $created_at, $updated_at): void
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }


    public function __toString(): string {
        return
            "id: " . $this->id .
            "\r\n title: " . $this->title .
            "\r\n content: " . $this->content .
            "\r\n user_id: " . $this->user_id .
            "\r\n created_at: " . $this->created_at .
            "\r\n updated_at: " . $this->updated_at .
            "<br>";
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
