<?php

class Comment
{
	public $id;
    public $content;
    public $userId;
    public $postId;

    public function __construct($id = null, $content = null, $postId = null, $userId = null)
    {
        $this->id = $id;
        $this->content = $content;
        $this->userId = $userId;
        $this->postId = $postId;
    }
}
