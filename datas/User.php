<?php

class User
{
	public $id;
    public $name;
    public $age;

    public function __construct($id = null, $name = null, $age = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function comment()
    {
        $comments = CommentModel::get();
        foreach ($comments as $comment) {
            if ($comment->userId === $this->id) $commentsOfUser[] = $comment;
        }
        return $commentsOfUser;
    }

    public function post()
    {
        $posts = PostModel::get();
        foreach ($posts as $post) {
            if ($post->userId === $this->id) $postsOfUser[] = $post;
        }
        return $postsOfUser;
    }
}
