<?php
class DataBase{
        private $host;
        private $user_name;
        private $password;
        private $database;
        private $con;

    public function __construct($host,$user_name,$password,$database){
        $this->host = $host;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->database = $database;
        $this->result = '';
        $this->Initconnect();
    }

    public function Initconnect(){
        $this->con = mysql_connect($this->host,$this->user_name,$this->password);
        if(!$this->con){
        die("连接失败：".mysql_error());
        }
        mysql_query("set names utf8");
        $db_selected = mysql_select_db($this->database);
    }

    public function Insert($tablename,$column = array(),$msg){
        $columnname = "";
        $columnvalue = "";
        foreach($column as $key => $value){
            $columnname .= $key . ",";
            $columnvalue .= "'" . $value . "',";
        }
        $columnname = substr($columnname,0,strlen($columnname) - 1);
        $columnvalue = substr($columnvalue,0,strlen($columnvalue) - 1);
        $sql = "INSERT INTO $tablename ($columnname) VALUES ($columnvalue)";
        $this->Query($sql);
        if($this->result){
            echo $msg;
            return $this->result;
        }

    }

    public function Update($tablename,$column = array(),$where = "",$msg){
        $updatevalue = "";
        foreach ($column as $key => $value) {
            $updatevalue .= $key . "='".$value."',";
        }
        $updatevalue = substr($updatevalue,0,strlen($updatevalue) - 1);
        $sql = "UPDATE $tablename SET $updatevalue";
        $sql .=$where ? " WHERE $where" : null;
        $this->Query($sql);
        if($this->result){
            echo $msg;
        }
    }

    public function Select($tablename,$columnname = "*",$where = ""){
        $sql = "SELECT " . $columnname . " FROM " . $tablename;
        $sql .= $where ? " WHERE " . $where : null;
        $this->Query($sql);
        $num=mysql_num_rows($this->result);
        return $num;
    }

    public function Delete($tablename,$where = "",$msg){
        $sql = "DELETE FROM $tablename";
        $sql .=$where ? " WHERE $where" : null;
        $this->Query($sql);
        if($this->result){
            echo $msg;
        }
    }

    public function Query($sql){
        $this->result = mysql_query($sql);
        return $this->result;
    }

    public function __destruct(){
        mysql_close($this->con);
    }
}
?>