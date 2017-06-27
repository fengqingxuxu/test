<?php
        function DataBase($host,$user_name,$password,$database){
            $con=mysql_connect("$host","$user_name","$password");
            if(!$con){
                die("连接失败：".mysql_error());
            }
            mysql_query("set names utf8");
            $db_selected=mysql_select_db("$database");
        }

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
            DataBase('localhost','root','780840','project');
            $sql="select * from register where username=$username";
            $rs=mysql_query($sql);
            $num=mysql_num_rows($rs);
            if($num){
                echo "用户名已存在！";
                header("Refresh:1;url=register.html");
                exit();
            }
            $sql="insert into register (username,pwd) values ('$username','$pwd')";
            $rs=mysql_query($sql);
            if($rs){
                echo "注册成功！";
                header("Refresh:1;url=#");
                exit();
            }
            echo "注册失败！";
            header("Refresh:1;url=register.html");
?>