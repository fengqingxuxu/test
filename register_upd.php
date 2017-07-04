<?php
    require_once 'DataBase.class.php';

    $username = $_POST["username"];
    $pwd          = md5(isset($_POST["pwd"]) ? $_POST["pwd"] : "");
    $cpwd        = md5(isset($_POST["cpwd"]) ? $_POST["cpwd"] : "");

if($username == "" || $pwd == "" || $cpwd == ""){
    echo "请填写完整信息！";
    header("Refresh:1;url = register.html");
    exit();
}

if($pwd !== $cpwd){
    echo "密码不一致！";
    header("Refresh:1;url = register.html");
    exit();
}

    $db = new DataBase('localhost','root','780840','project');
    $num = $db->Select("user","*","username = '".$username."'");
if($num){
    echo "用户名已存在！";
    header("Refresh:1;url = register.html");
    exit();
}

    $user_info = array('username'=>$username,'pwd'=>$pwd);
    $result = $db->Insert("user",$user_info);
    $db->Msg($result,"插入成功","插入失败","login","register");
?>