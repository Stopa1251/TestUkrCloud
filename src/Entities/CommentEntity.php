<?php

namespace App\Entities;

use App\configs\Database;

class CommentEntity
{
    protected $id;
    protected $content;
    protected $user_id;
    protected $post_id;
    protected $created_at;
    protected $updated_at;

    public function __construct()
    {
    }

    public function setComment($id, $content, $user_id, $post_id, $created_at, $updated_at): void
    {
        $this->id = $id;
        $this->content = $content;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }


    public function __toString(): string {
        return
            "id: " . $this->id .
            "\r\n content: " . $this->content .
            "\r\n user_id: " . $this->user_id .
            "\r\n post_id: " . $this->post_id .
            "\r\n created_at: " . $this->created_at .
            "\r\n updated_at: " . $this->updated_at .
            "<br>";
    }

    public function getId()
    {
        return $this->id;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getPostId()
    {
        return $this->post_id;
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
