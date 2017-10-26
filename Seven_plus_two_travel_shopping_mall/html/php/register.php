<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23 0023
 * Time: 上午 9:22
 */

header('Access-Control-Allow-Origin: *');


$username = $_POST["username"];
$pwd = $_POST["pwd"];
$phone = $_POST["phone"];


$conn = new mysqli("127.0.0.1","root","","mydb")or die("连接失败");

$sql = "select * from users where username='$username'";
$result = $conn->query($sql);
if ($result && $result->num_rows>0) {
    $arr = array("status"=>0, "msg"=>"用户名已经存在");
    echo  json_encode($arr);
}
else {
    //插入数据， 注册
    $sql = "insert into users(username,password,phone) values('$username', '$pwd', '$phone')";
    $result = $conn->query($sql);
    if ($result) {
        $arr = array("status"=>1, "msg"=>"注册成功");
        echo  json_encode($arr);
    } else {
        $arr = array("status"=>0, "msg"=>"注册失败");
        echo  json_encode($arr);
    }
}
$conn->close();