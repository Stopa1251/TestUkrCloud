<?php

namespace App\Models;

use App\configs\Database;
use App\Entities\PostEntity;

class Post
{
    private $instance;
    protected static $posts;

    public function __construct() {
        try {
            $this->instance = new Database();
        } catch (\PDOException $exception) {
            d('PDOException: ');
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        }
    }


    public function getPosts()
    {
        try {
            $query = "SELECT * FROM posts";
            $result = $this->instance->query($query);

            self::$posts = $this->setPostsEntity($result);

            return self::$posts;
        } catch (\PDOException $exception) {
            d('PDOException: ');
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        }
    }

    public function getPost($id)
    {
        try {
            $query = "SELECT * FROM posts WHERE id = ?";
            $result = $this->instance->query($query, array($id));
            $result = $result[0];
            $postEntity = new PostEntity();
            $postEntity->setPost($result['id'], $result['title'], $result['content'], $result['user_id'], $result['created_at'], $result['updated_at']);

            return $postEntity;
        } catch (\PDOException $exception) {
            d('PDOException: ');
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        }
    }

    protected function setPostsEntity($postsQuery)
    {
        $userPosts = [];
        $indexOfPosts = 1;
        foreach ($postsQuery as $postQuery) {
            $postEntity = new PostEntity();
            $postEntity->setPost($postQuery['id'], $postQuery['title'], $postQuery['content'], $postQuery['user_id'], $postQuery['created_at'], $postQuery['updated_at']);

            $userPosts[$indexOfPosts++] = $postEntity;
        }
        return $userPosts;
    }

    public function getUserPosts($user_id)
    {
        try {
            $query = "SELECT * FROM posts WHERE user_id = ?";
            $result = $this->instance->query($query, array($user_id));
            return $this->setPostsEntity($result);
        } catch (\PDOException $exception) {
            d('PDOException: ');
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        }
    }

    public function createPost($title, $content, $user_id)
    {
        try {
            $query = "INSERT INTO posts (title, content, user_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
            $this->instance->execute($query, [$title, $content, $user_id]);
        } catch (\PDOException $exception) {
            d('PDOException: ');
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' - ' . $exception->getMessage());
        }
    }

    public function deletePost($post_id) {
        $query = "DELETE FROM posts WHERE id = ?";
        $this->instance->execute($query, [$post_id]);
    }
    public function updatePost($post_id, $updatedPost) {
        $query = "UPDATE posts 
          SET (title = ?, content = ?, user_id = ?, updated_at = NOW()) 
          WHERE id = ?";
        $this->instance->execute($query, [$updatedPost->getTitle(), $updatedPost->getContent(), $updatedPost->getUserId(), $updatedPost->getId()]);
    }
}
