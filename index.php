<?php

require_once 'datas/User.php';
require_once 'Models/UserModel.php';
require_once 'Controls/UserControl.php';
require_once 'datas/Post.php';
require_once 'Models/PostModel.php';
require_once 'Controls/PostControl.php';
require_once 'datas/Comment.php';
require_once 'Models/CommentModel.php';
require_once 'Controls/CommentControl.php';


echo '<pre>';
// UserModel::add($name, $age)
UserModel::add('user1', 20);
UserModel::add('user2', 22);
UserModel::add('user3', 18);
UserModel::add('user4', 19);
UserModel::add('user5', 21);
UserModel::add('user6', 19);
UserModel::add('user7', 25);
UserModel::add('user8', 17);
UserModel::add('user9', 15);

// PostModel::add($content, $time, $userId)
PostModel::add('this is the post 1', '01:00 07/04/2019', 1);
PostModel::add('this is the post 2', '02:00 07/04/2019', 1);
PostModel::add('this is the post 3', '03:00 07/04/2019', 1);
PostModel::add('this is the post 4', '04:00 07/04/2019', 2);
PostModel::add('this is the post 5', '05:00 07/04/2019', 2);
PostModel::add('this is the post 6', '06:00 07/04/2019', 5);
PostModel::add('this is the post 7', '07:00 07/04/2019', 7);
PostModel::add('this is the post 8', '08:00 07/04/2019', 4);
PostModel::add('this is the post 9', '09:00 07/04/2019', 100);
PostModel::add('this is the post 10', '10:00 07/04/2019', 99);
PostModel::add('this is the post 11', '11:00 07/04/2019', 1);

// CommentModel::add($content, $postId, $userId)
CommentModel::add('this is the comment 1', 2, 1);
CommentModel::add('this is the comment 2', 1, 1);
CommentModel::add('this is the comment 3', 1, 1);
CommentModel::add('this is the comment 4', 1, 2);
CommentModel::add('this is the comment 5', 3, 2);
CommentModel::add('this is the comment 6', 5, 5);
CommentModel::add('this is the comment 7', 2, 7);
CommentModel::add('this is the comment 8', 3, 3);
CommentModel::add('this is the comment 9', 99, 1);
CommentModel::add('this is the comment 10', 1, 99);
CommentModel::add('this is the comment 11', 1, 1);
CommentModel::add('this is the comment 12', 3, 1);
CommentModel::add('this is the comment 13', 3, 3);
CommentModel::add('this is the comment 14', 3, 5);

$users = UserModel::get(); // get all user
$html = '<table border="1" style="width:500px"><tr><td><b>Id</b></td><td><b>Name</b></td><td><b>Age</b></td></tr>';
foreach ($users as $user) {
	$html .= "<tr><td>{$user->id}</td><td>{$user->name}</td><td>{$user->age}</td></tr>";
}
$html .= '</table>';
echo $html;

$user = UserModel::get(1); // get user info

// all comments of user
$html = '<table border="1" style="width:500px"><tr><td><b>Id</b></td><td><b>UserId</b></td><td><b>Content</b></td><td><b>PostId</b></td></tr>';
foreach ($user->comment() as $comment) {
	$html .= "<tr><td>{$comment->id}</td><td>{$comment->userId}</td><td>{$comment->content}</td><td>{$comment->postId}</td></tr>";
}
$html .= '</table>';
echo $html;

// all post of user
$html = '<table border="1" style="width:500px"><tr><td><b>Id</b></td><td><b>UserId</b></td><td><b>Content</b></td><td><b>Time</b></td></tr>';
foreach ($user->post() as $post) {
	$html .= "<tr><td>{$post->id}</td><td>{$post->userId}</td><td>{$post->content}</td><td>{$post->time}</td></tr>";
}
$html .= '</table>';
echo $html;

$posts = PostModel::get(); // get all post
$html = '<table border="1" style="width:500px"><tr><td><b>Id</b></td><td><b>Content</b></td><td><b>UserId</b></td><td><b>Time</b></td></tr>';
foreach ($posts as $post) {
	$html .= "<tr><td>{$post->id}</td><td>{$post->content}</td><td>{$post->userId}</td><td>{$post->time}</td></tr>";
}
$html .= '</table>';
echo $html;

$post = PostModel::get(1); // get post info

// all comments of post
$html = '<table border="1" style="width:500px"><tr><td><b>Id</b></td><td><b>UserId</b></td><td><b>Content</b></td><td><b>PostId</b></td></tr>';
foreach ($post->comment() as $comment) {
	$html .= "<tr><td>{$comment->id}</td><td>{$comment->userId}</td><td>{$comment->content}</td><td>{$comment->postId}</td></tr>";
}
$html .= '</table>';
echo $html;

$userPost = $post->user(); // get user post
var_dump($userPost);
?>