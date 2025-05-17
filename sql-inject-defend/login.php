<?php
$username = $_POST["username"];
$password = $_POST["password"];
$db = new mysqli("localhost", "root", "password", "test");
// 存在SQL注入攻击
$result = $db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo "登录成功";
} else {
    echo "登录失败";
}