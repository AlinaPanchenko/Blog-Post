<?php
require './connect.php';

$postId = $_GET['post'];
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$message = strip_tags($_POST['message']);
$date = date("Y-m-d");

$conn->query("INSERT INTO `comment` (`name`, `email`, `message`, `date`, `postId`) VALUES ('$name', '$email', '$message', '$date', '$postId')");

$commentId = $conn->query("SELECT `id` FROM `comment` WHERE `name` = '$name' AND `email` = '$email' AND `postId` = '$postId'");
$commentId = $commentId->fetch_assoc();

$postComments = $conn->query("SELECT * FROM `post` WHERE `id` = '$postId'");
$postComments = $postComments->fetch_assoc();
$newComments_num = $postComments['comments_num'] + 1;

$finalComments = $commentId['id']." | ".$postComments['comments'];

$conn->query("UPDATE `post` SET `comments_num` = '$newComments_num', `comments` = '$finalComments' WHERE `id` = '$postId'");

header("Location: ../");

?>