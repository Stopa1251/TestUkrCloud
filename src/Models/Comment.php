<?php

namespace App\Models;

use App\configs\Database;
use App\Entities\CommentEntity;

class Comment
{
    private $instance;

    protected static $comments;

    public function __construct() {
        $this->instance = new Database();
    }

    protected function getCommentsEntity($commentsQuery)
    {
        $postComments = [];
        $indexOfComments = 1;
        foreach ($commentsQuery as $commentQuery) {
            $commentEntity = new CommentEntity();
            $commentEntity->setComment($commentQuery['id'], $commentQuery['content'], $commentQuery['user_id'], $commentQuery['post_id'], $commentQuery['created_at'], $commentQuery['updated_at']);
            $postComments[$indexOfComments++] = $commentEntity;
        }
        return $postComments;
    }

    public function getPostComments($post_id)
    {
        $query = "SELECT * FROM comments WHERE post_id = ?";
        $result = $this->instance->query($query, array($post_id));
        $result = $result;
        return $this->getCommentsEntity($result);
    }


    public function getComments()
    {
        $query = "SELECT * FROM comments";
        $result = $this->instance->query($query);
        $result = $result;
        $this->getCommentsEntity($result);

        self::$comments = $this->getCommentsEntity($result);
        return self::$comments;
    }

    /**
    * У методичці до тестового не зовсім чітко пояснено створення GET /api.php?action=getCommentsCount маршруту.
    * Тому я реалізував два методи для getCommentsCount, який повертає кількість коментарів кожного користувача,
     * та getUsersComments для отримання списку коментарів для користувачів.
    **/

    public function getCommentsCount()
    {
        $query = "
            SELECT
                users.id,
                users.name,
                users.email,
                COUNT(comments.id) AS comment_count
            FROM users
            LEFT JOIN comments ON users.id = comments.user_id
            GROUP BY users.id, users.name, users.email
            ORDER BY comment_count DESC;
        ";
        $result = $this->instance->query($query);

        return $result;
    }

    public function getUsersComments()
    {
        $query = "
            SELECT 
                comments.id AS comment_id, 
                comments.content AS comment_content, 
                comments.post_id, 
                comments.created_at AS comment_created_at, 
                comments.updated_at AS comment_updated_at, 
                users.id AS user_id, 
                users.name AS user_name, 
                users.email AS user_email
            FROM comments 
            LEFT JOIN users ON 
                comments.user_id = users.id
        ";
        $result = $this->instance->query($query);

        return $result;
    }

    public function createComment($content, $user_id, $post_id)
    {
        try {
            $query = "INSERT INTO comments (content, user_id, post_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
            $this->instance->execute($query, [$content, $user_id, $post_id]);
        } catch (\PDOException $exception) {
            d('PDOException: ');
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        }
    }

    public function deletePost($comment_id) {
        $query = "DELETE FROM comments WHERE id = ?";
        $this->instance->execute($query, [$comment_id]);
    }
    public function updateUser($id, $updatedComment) {
        $query = "UPDATE users 
          SET (content = ?, user_id = ?, post_id = ?, updated_at = NOW()) 
          WHERE id = ?";
        $this->instance->execute($query, [$updatedComment->getContent(), $updatedComment->getUserId(), $updatedComment->getPostId(), $updatedComment->getId()]);
    }
}
