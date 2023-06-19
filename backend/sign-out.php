<?php

setcookie("name", 0,  time()-3600*24*30, "/");
setcookie("email", 0, time()-3600*24*30, "/");

unset($_COOKIE["name"]);
unset($_COOKIE["email"]);

header("Location: ../");
?>