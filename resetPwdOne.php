<?php

    require_once 'DataBase.class.php';

    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $pwd          = md5(isset($_POST["pwd"]) ? $_POST["pwd"] : "");

    session_start();
    $_SESSION['username'] = $username;

if($username == "" || $pwd == ""){
    echo "请填写完整信息！";
    header("Refresh:1;url = resetPwdOne.html");
    exit();
}

    $db = new DataBase('localhost','root','780840','project');
    $result = $db->Select("user","*","username = '".$username."' and pwd = '".$pwd."'");
    $db->Msg($result,"","用户名或密码错误","resetPwdTwo","resetPwdOne");
?>