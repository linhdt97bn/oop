<?php

class PostControl
{
    public function getAllPost()
    {
    	$posts = PostModel::get();
        return $posts;
    }

    public function displayAllPost()
    {
        $posts = PostModel::get();
        $html = 'posts: {';
        foreach ($posts as $post) { 
            $html .= "<div style='font-size:11px; margin-left:20px;'>{ id:{$post->id}, content:'{$post->content}', time:'{$post->time}', userId:{$post->userId} }</div>";
        }
        $html .= '}<br>';
        echo $html;
    }

    public function addPost($content, $time, $userId)
    {
        $post = PostModel::add($content, $time, $userId);
        if ($post !== null) {
            echo "<div style='font-size:10px; color: green'>Thêm post: Đã thêm post: { id:{$post->id}, content:'{$post->content}', time:'{$post->time}', userId:{$post->userId} }</div>";
            return $post;
        }

        echo '<div style="font-size:10px; color:red">Thêm post: Không tồn tại user có id = ' . $userId . '</div>';
        return null;
    }

    public function editPost($id, $content, $time)
    {
        $post = PostModel::edit($id, $content, $time);      
        if ($post !== null) {
            echo "<div style='font-size:10px; color: green'>Sửa post: Đã sửa post: { id:{$post->id}, content:'{$post->content}', time:'{$post->time}', userId:{$post->userId} }</div>";
            return $post;
        }

        echo '<div style="font-size:10px; color:red">Sửa post: Không tìm thấy post có id = ' . $id . '</div>';
        return null;
    }

    public function deletePost($id)
    {
    	$post = PostModel::delete($id);
        if ($post !== null) {
            echo "<div style='font-size:10px; color: green'>Xóa post: Đã xóa post: { id:{$post->id}, content:'{$post->content}', time:'{$post->time}', userId:{$post->userId} }</div>";
            return $post;
        }

        echo '<div style="font-size:10px; color:red">Xóa post: Không tìm thấy post có id = ' . $id . '</div>';
        return null;
    }

    public function getPostInfo($id)
    {
    	$post = PostModel::get($id);

        if ($post !== null) {
            echo "<div style='font-size:10px; color: green'>Lấy thông tin post: { id:{$post->id}, content:'{$post->content}', time:'{$post->time}', userId:{$post->userId} }</div>";
            return $post;
        }

        echo '<div style="font-size:10px; color:red">Lấy thông tin post: Không tìm thấy post có id = ' . $id . '</div>';
        return null;
    }
}