<?php
    require_once 'DataBase.class.php';

    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $cpwd=$_POST["cpwd"];
if($username=="" || $pwd=="" || $cpwd==""){
    echo "请填写完整信息！";
    header("Refresh:1;url=register.html");
    exit();
}
if($pwd!==$cpwd){
    echo "密码不一致！";
    header("Refresh:1;url=register.html");
    exit();
}
    $db=new DataBase('localhost','root','780840','project');
    $num=$db->select("register","*","username='".$username."'");
if($num){
    echo "用户名已存在！";
    header("Refresh:1;url=register.html");
    exit();
}
    $user_info=array('username'=>$username,'pwd'=>$pwd);
    $rs=$db->insert("register",$user_info,"数据插入成功");
if($rs){
    echo "注册成功！";
    header("Refresh:1;url=register.html");
    exit();
}
    echo "注册失败！";
    header("Refresh:1;url=register.html");
?>