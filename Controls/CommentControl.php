<?php

class CommentControl
{
    public function getAllComment()
    {
    	$comments = CommentModel::get();
        return $comments;
    }

    public function displayAllComment()
    {
        $comments = CommentModel::get();
        $html = 'comments: {';
        foreach ($comments as $comment) { 
            $html .= "<div style='font-size:11px; margin-left:20px;'>{ id:{$comment->id}, content:'{$comment->content}', postId:'{$comment->postId}', userId:{$comment->userId} }</div>";
        }
        $html .= '}<br>';
        echo $html;
    }

    public function addComment($content, $postId, $userId)
    {
        $comment = CommentModel::add($content, $postId, $userId);
        if ($comment !== null) {
            echo "<div style='font-size:10px; color: green'>Thêm comment: Đã thêm comment: { id:{$comment->id}, content:'{$comment->content}', postId:'{$comment->postId}', userId:{$comment->userId} }</div>";
            return $comment;
        }

        echo "<div style='font-size:10px; color:red'>Thêm comment: Không tồn tại user có id = {$userId} hoặc post có id = {$postId}</div>";
        return null;
    }

    public function editComment($id, $content)
    {
        $comment = CommentModel::edit($id, $content);      
        if ($comment !== null) {
            echo "<div style='font-size:10px; color: green'>Sửa comment: Đã sửa comment: { id:{$comment->id}, content:'{$comment->content}', postId:'{$comment->postId}', userId:{$comment->userId} }</div>";
            return $comment;
        }

        echo '<div style="font-size:10px; color:red">Sửa comment: Không tìm thấy comment có id = ' . $id . '</div>';
        return null;
    }

    public function deleteComment($id)
    {
    	$comment = CommentModel::delete($id);
        if ($comment !== null) {
            echo "<div style='font-size:10px; color: green'>Xóa comment: Đã xóa comment: { id:{$comment->id}, content:'{$comment->content}', postId:'{$comment->postId}', userId:{$comment->userId} }</div>";
            return $comment;
        }

        echo '<div style="font-size:10px; color:red">Xóa comment: Không tìm thấy comment có id = ' . $id . '</div>';
        return null;
    }

    public function getCommentInfo($id)
    {
    	$comment = CommentModel::get($id);

        if ($comment !== null) {
            echo "<div style='font-size:10px; color: green'>Lấy thông tin comment: { id:{$comment->id}, content:'{$comment->content}', postId:'{$comment->postId}', userId:{$comment->userId} }</div>";
            return $comment;
        }

        echo '<div style="font-size:10px; color:red">Lấy thông tin comment: Không tìm thấy comment có id = ' . $id . '</div>';
        return null;
    }

}