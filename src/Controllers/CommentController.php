<?php

namespace App\Controllers;

use App\Models\Comment;

class CommentController
{

    protected Comment $commentModel;
    public function __construct() {
        $this->commentModel = new Comment();
    }
    public function getComments() {
        return $this->commentModel->getComments();
    }
    public function getPostComments($post_id) {
        return $this->commentModel->getPostComments($post_id);
    }

    public function getCommentsCount() {
        return $this->commentModel->getCommentsCount();
    }
    public function getUsersComments() {
        return $this->commentModel->getUsersComments();
    }
    public function createComment($content, $user_id, $post_id) {
        $this->commentModel->createComment($content, $user_id, $post_id);
    }


}
