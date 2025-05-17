<?php
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password !== $password2) {
    echo "密码不一致";
    header("refresh: 2; url=register.html");
    exit;
}

$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'password');
// 先检查，用户名是否被注册
$pre = $db->prepare("select * from user where username = :username");
$pre->execute(array(':username' => $username));
$row = $pre->fetch(PDO::FETCH_NUM);

if ($row) {
    echo "用户名被占用";
    header("refresh: 2; url=register.html");
} else {
    $pre = $db->prepare("INSERT INTO user(username, password) VALUES(:username, :password)");
    $password = md5($password);
    $pre->execute(array(':username' => $username, ':password' => $password));
    echo "注册成功";
    header("Refresh: 2; url=login.html");
    exit;
}


