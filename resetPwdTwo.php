<?php
    require_once 'DataBase.class.php';

    $npwd = md5(isset($_POST["npwd"]) ? $_POST["npwd"] : "");
    $cnpwd = md5(isset($_POST["cnpwd"]) ? $_POST["cnpwd"] : "");
    session_start();
    $username = $_SESSION['username'];

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
    $result = $db->Update("user",$userInfo,"username = '".$username."'");
    $db->Msg($result,"更新成功","更新失败","login","resetPwdOne");
?>