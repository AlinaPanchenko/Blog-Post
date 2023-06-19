<?php
require './connect.php';

$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

$password = md5($password);

$result = $conn->query("SELECT * FROM `user` WHERE `password` = '$password' AND `email` = '$email'");
$user = $result->fetch_assoc();

setcookie("name", $user['name'], time()+3600*24*30, "/");
setcookie("email", $user['email'], time()+3600*24*30, "/");

header("Location: ../");
?>