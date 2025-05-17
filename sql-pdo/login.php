<?php
$username = $_POST["username"];
$password = $_POST["password"];
$db = new pdo("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "password");
// sql注入
//$sql = "select * from user where username = '$username' and password = '$password'";
//$result = $db->query($sql);
// 预处理
$pre = $db->prepare("SELECT * FROM user WHERE username = :name and password = :psd");
//$pre->bindParam(":name", $username);
//$pre->bindParam(":psd", $password);
//$pre->execute();
// 批量参数
$arr = [':name' => $username, ':psd' => $password];
$pre->execute($arr);
// FETCH_NUM 索引数组；FETCH_ASSOC 关联数组
$row = $pre->fetch(PDO::FETCH_NUM);
if ($row) {
    echo "登录成功";
} else {
    echo "登录失败";
}