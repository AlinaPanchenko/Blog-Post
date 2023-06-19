<?php
if(empty($_COOKIE['email']) && empty($_COOKIE['name'])){
    header("Location: ../");
}
require './connect.php';

$cookieName = $_COOKIE['name'];
$cookieEmail = $_COOKIE['email'];

$password1 = strip_tags($_POST['password1']);
$password2 = strip_tags($_POST['password2']);

if($password1 == $password2){
    $password = md5($password1);
    $conn->query("UPDATE `user` SET `password` = '$password' WHERE `email` = '$cookieEmail'");
    header("Location: ../user/profile");
} else {
    echo "Passwords are not the same. Try again later";
}
?>