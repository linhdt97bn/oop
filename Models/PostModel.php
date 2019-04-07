<?php

class PostModel
{
    public static $posts = [];

    public function add($content, $time, $userId)
    {
        $users = UserModel::get();
        for ($i = 0; $i < count($users); $i++) { 
            if ($users[$i]->id === $userId) {
                $postsLength = count(self::$posts);
                $id = $postsLength ? self::$posts[$postsLength - 1]->id + 1 : 1;
                self::$posts[] = new Post($id, $content, $userId, $time);
                return self::$posts[$postsLength];
            }
        }

        return null;
    }

    public function edit($id, $content, $time)
    {
        $posts = PostModel::get();
        for ($i = 0; $i < count($posts); $i++) { 
            if ($posts[$i]->id === $id) {
                self::$posts[$i]->content = $content;
                self::$posts[$i]->time = $time;
                return self::$posts[$i];
            }
        }

        return null;
    }

    public function delete($id)
    {
        $posts = PostModel::get();
        for ($i = 0; $i < count($posts); $i++) { 
            if ($posts[$i]->id === $id) {
                $post = self::$posts[$i];
                array_splice(self::$posts, $i, 1);
                return $post;
            }
        }
        
        return null;
    }

    public function get($id = null)
    {
        if ($id === null) return self::$posts;
        
        for ($i = 0; $i < count(self::$posts); $i++) { 
            if (self::$posts[$i]->id === $id) return self::$posts[$i];
        }

        return null;
    }
}
