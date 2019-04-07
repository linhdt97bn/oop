<?php

class Post
{
	public $id;
    public $content;
    public $userId;
    public $time;

    public function __construct($id = null, $content = null, $userId = null, $time = null)
    {
        $this->id = $id;
        $this->content = $content;
        $this->userId = $userId;
        $this->time = $time;
    }


    public function user()
    {
        $users = UserModel::get();
        foreach ($users as $user) {
            if ($user->id === $this->userId) return $user;
        }

        return null;
    }

    public function comment()
    {
        $comments = CommentModel::get();
        foreach ($comments as $comment) {
            if ($comment->postId === $this->id) $commentsOfPost[] = $comment;
        }

        if ($commentsOfPost) return $commentsOfPost;
        return null;
    }
}
