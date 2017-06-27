<?php
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $cpwd=$_POST["cpwd"];
    if($username=="" || $pwd=="" || $cpwd==""){
        echo "请填写完整信息！";
        header("Refresh:1;url=register.html");
    }
    else{
        if($pwd==$cpwd){
            $con=mysql_connect("localhost","root","780840");
            if(!$con){
                die("连接失败：".mysql_error());
            }
            mysql_query("set names utf8");
            $db_selected=mysql_select_db("project");
            $sql="select * from register where username='$username'";
            $rs=mysql_query($sql);
            $num=mysql_num_rows($rs);
            if($num){
                echo "用户名已存在！";
                header("Refresh:1;url=register.html");
            }
            else{
                $sql="insert into register (username,pwd) values ('$username','$pwd')";
                $rs=mysql_query($sql);
                if($rs){
                    echo "注册成功！";
                    header("Refresh:1;url=register.html");
                }
                else{
                    echo "注册失败！";
                    header("Refresh:1;url=register.html");
                }
            }
        }
        else {
            echo "密码不一致！";
            header("Refresh:1;url=register.html");
        }
    }
}
?>