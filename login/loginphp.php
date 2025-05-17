<?php

$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password);

$db = new PDO("mysql:host=localhost;dbname=test", "root", "password");
$pre = $db->prepare("select * from user where username = :username and password = :password");
$pre->execute(array(":username" => $username, ":password" => $password));
$row = $pre->fetch(PDO::FETCH_NUM);
if ($row) {
    echo '登录成功';
} else {
    echo '登录失败';
    header("Refresh: 2; url=login.html");
    exit;
}
