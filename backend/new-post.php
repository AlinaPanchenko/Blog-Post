<?php
if(empty($_COOKIE['email']) && empty($_COOKIE['name'])){
    header("Location: ../");
}
require './connect.php';

$title = strip_tags($_POST['title']);
$message = strip_tags($_POST['message']);
$author = $_COOKIE['email'];
$date = date("Y-m-d");

$conn->query("INSERT INTO `post` (`title`, `message`, `comments_num`, `author`, `date`, `comments`) VALUES ('$title', '$message', 0, '$author', '$date', 0)");

header("Location: ../user/dashboard");
?>