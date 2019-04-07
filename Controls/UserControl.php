<?php

class UserControl
{
	public function displayAllUser()
	{
        $users = UserModel::get();
        $html = 'users: {';
        foreach ($users as $user) {
            $commentHtml = '';
            foreach ($user->comments as $comment) {
                $commentHtml .= "{ id:{$comment->id}, content:{$comment->content}, userId: {$comment->userId}, postId: {$comment->postId} }, ";
            }
            $commentHtml = trim($commentHtml, ', ');

            $html .= "<div style='font-size:11px; margin-left:20px;'>{ id:{$user->id}, name:'{$user->name}', age:{$user->age}, comments:[{$commentHtml}] }</div>";
        }
        $html .= '}<br>';
        echo $html;
	}

    public function getAllUser()
    {
    	$users = UserModel::getAll();
        return $users;
    }

    public function addUser($name, $age)
    {
    	$user = UserModel::add($name, $age);
        if ($user !== null) {
            echo "<div style='font-size:10px; color: green'>Thêm user: Đã thêm user: { id:{$user->id}, name:'{$user->name}', age:'{$user->age}' }</div>";
        }
        return $user;
    }

    public function editUser($id, $name, $age)
    {
    	$user = UserModel::edit($id, $name, $age);      
        if ($user !== null) {
            echo "<div style='font-size:10px; color: green'>Sửa user: Đã sửa user: { id:{$user->id}, name:'{$user->name}', age:'{$user->age}' }</div>";
            return $user;
        }

        echo '<div style="font-size:10px; color:red">Sửa user: Không tìm thấy user có id = ' . $id . '</div>';
        return null;
    }

    public function deleteUser($id)
    {
    	$user = UserModel::delete($id);
        if ($user !== null) {
            echo "<div style='font-size:10px; color: green'>Xóa user: Đã xóa user: { id:{$user->id}, name:'{$user->name}', age:'{$user->age}' }</div>";
            return $user;
        }

        echo '<div style="font-size:10px; color:red">Xóa user: Không tìm thấy user có id = ' . $id . '</div>';
        return null;
    }

    public function displayUserInfo($id)
    {
    	$user = UserModel::get($id);

        if ($user !== null) {
            echo "<div style='font-size:10px; color: green'>Lấy thông tin user: { id:{$user->id}, name:'{$user->name}', age:'{$user->age}' }</div>";
            return $user;
        }

        echo '<div style="font-size:10px; color:red">Lấy thông tin user: Không tìm thấy user có id = ' . $id . '</div>';
        return null;
    }

    public function getUserInfo($id)
    {
        $user = UserModel::get($id);
        return $user;
    }
}