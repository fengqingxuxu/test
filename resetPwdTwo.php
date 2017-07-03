<?php
    require_once 'DataBase.class.php';

    $npwd = isset($_POST["npwd"]) ? $_POST["npwd"] : "";
    $cnpwd = isset($_POST["cnpwd"]) ? $_POST["cnpwd"] : "";    var_dump($_GET["username"]);
    $username = $_GET["username"];

if($npwd == "" || $cnpwd == ""){
    echo "请填写完整信息！";
    header("Refresh:1;url=resetPwdTwo.html");
    exit();
}
if($npwd !== $cnpwd){
    echo "密码不一致！";
    header("Refresh:1;url = resetPwdTwo.html");
    exit();
}
    $db = new DataBase('localhost','root','780840','project');
    $userInfo = array('pwd'=>$npwd);
    $rs = $db->Update("user",$userInfo,"username=$username","数据更新成功");
if($rs){
    echo "更新成功！";
    header("Refresh:1;url = login.html");
    exit();
}
    echo "更新失败！";
    header("Refresh:1;url = resetPwdOne.html");
?>