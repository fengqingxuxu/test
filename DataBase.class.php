<?php
class DataBase{
        private $result='';

    public function __construct($host,$user_name,$password,$database){
        $con = mysql_connect("$host","$user_name","$password");
        if(!$con){
        die("连接失败：".mysql_error());
        }
        mysql_query("set names utf8");
        $db_selected = mysql_select_db("$database");
        return;
    }

    public function insert($tablename,$column = array()){
        $columnname = "";
        $columnvalue = "";
        foreach($column as $key => $value){
            $columnname .= $key . ",";
            $columnvalue .= "'" . $value . "',";
        }
        $columnname = substr($columnname,0,strlen($columnname) - 1);
        $columnvalue = substr($columnvalue,0,strlen($columnvalue) - 1);
        $sql = "INSERT INTO $tablename ($columnname) VALUES ($columnvalue)";
        $this->query($sql);
        if($this->result){
            echo "数据插入成功";
        }

    }

    public function update($tablename,$column = array(),$where = ""){
        $updatevalue = "";
        foreach ($column as $key => $value) {
            $updatevalue .= $key . "="'.$value.'",";
        }
        $updatevalue = substr($updatevalue,0,strlen($updatevalue) - 1);
        $sql = "UPDATE $tablename SET $updatevalue";
        $sql .=$where ? " WHERE $where" : null;
        $this->query($sql);
        if($this->result){
            echo "数据更新成功";
        }
    }

    public function select($tablename,$columnname = "*",$where = ""){
        $sql = "SELECT" . $columnname . "FROM" . $tablename;
        $sql .= $where ? " WHERE" . $where : null;
        $this->query($sql);
    }

    public function delete($tablename,$where = ""){
        $sql = "DELETE FROM $tablename";
        $sql .=$where ? " WHERE $where" : null;
        $this->query($sql);
        if($this->result){
            echo "数据删除成功";
        }
    }

    public function query($sql){
        $this->result = mysql_query($sql);
        return $this->result;
    }
}
?>