<?php

    require_once 'DataBase.class.php';

    $username   = isset($_POST["username"]) ? $_POST["username"] : "";
    $pwd            = isset($_POST["pwd"]) ? $_POST["pwd"] : "";

if($username == "" || $pwd == ""){
    echo "请填写完整信息！";
    header("Refresh:1;url = login.html");
    exit();
}

    $db = new DataBase('localhost','root','780840','project');
    $num = $db->Select("user","*","username = '".$username."' and pwd = '".$pwd."'");
if($num){
    echo "登陆成功";
    header("Refresh:1;url = index.html");
    exit();
}
    echo "用户名或密码错误";
    header("Refresh:1;url = login.html");
?>