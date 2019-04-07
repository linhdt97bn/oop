<?php

class CommentModel
{
    public static $comments = [];

    public function add($content, $postId, $userId)
    {
        $users = UserModel::get();
        $posts = PostModel::get();
        $usersLength = count($users);
        $postsLength = count($posts);
        $postIndex = $userIndex = 0;

        for ($postIndex; $postIndex < $postsLength; $postIndex++)
            if ($posts[$postIndex]->id === $postId) break;
        for ($userIndex = 0; $userIndex < $usersLength; $userIndex++)
            if ($users[$userIndex]->id === $userId) break;

        if ($postIndex < $postsLength && $userIndex < $usersLength) {
            $commentsLength = count(self::$comments);
            $id = $commentsLength ? self::$comments[$commentsLength - 1]->id + 1 : 1;
            self::$comments[] = new Comment($id, $content, $postId, $userId);
            return self::$comments[$commentsLength]; 
        }

        return null;
    }

    public function edit($id, $content)
    {
        $comments = CommentModel::get();
        for ($i = 0; $i < count($comments); $i++) { 
            if ($comments[$i]->id === $id) {
                self::$comments[$i]->content = $content;
                return self::$comments[$i];
            }
        }
        return null;
    }

    public function delete($id)
    {
        $comments = CommentModel::get();
        for ($i = 0; $i < count($comments); $i++) { 
            if ($comments[$i]->id === $id) {
                $comment = self::$comments[$i];
                array_splice(self::$comments, $i, 1);
                return $comment;
            }
        }
        
        return null;
    }

    public function get($id = null)
    {
        if ($id === null) {
            return self::$comments;
        }

        for ($i = 0; $i < count(self::$comments); $i++) { 
            if (self::$comments[$i]->id === $id) return self::$comments[$i];
        }

        return null;
    }


    public function user($userId)
    {
        $users = UserModel::get();
        $flagUser = false;
        for ($i = 0; $i < count($users); $i++) { 
            if ($users[$i]->id === $userId) {
                $flagUser = true;
                break;
            }
        }
        if ($flagUser === false) return null;

        foreach (self::$comments as $comment) {
            if ($comment->userId === $userId) $commentsOfUser[] = $comment;
        }
        if ($commentsOfUser) return $commentsOfUser;
        return null;
    }
}
