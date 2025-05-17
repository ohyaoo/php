<?php
$username = $_POST["username"];
$password = $_POST["password"];
$db = new mysqli("localhost", "root", "password", "test");
// mysqli自带预处理，固定sql语句模版
$pre = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
// ss => string string
$pre->bind_param("ss", $username, $password);
$pre->execute();
$result = $pre->get_result();
// 读取一行数据
$row = $result->fetch_assoc();

if ($row) {
    echo "登录成功";
} else {
    echo "登录失败";
}