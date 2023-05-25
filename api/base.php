<?php
date_default_timezone_set("Asia/Taipei");
session_start();
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:$url");
}
class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db40";
    protected $pdo;
    function __construct($table)
    {
        $this->pdo = new PDO($this->dsn,'root','');
        $this->table = $table;
    }
    function arrSql($array){
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }
    function math($math,$col,...$arg){
        $sql = "select $math($col) from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arrSql($arg[0]);
                $sql .="where ".join(" && ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        return $sql;
    }
    function all(...$arg){
        $sql = "select * from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arrSql($arg[0]);
                $sql .="where ".join(" && ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($id){
        $sql = "select * from $this->table ";
        if(is_array($id)){
            $tmp = $this->arrSql($id);
            $sql .="where ".join(" && ",$tmp);
        }else{
            $sql .="where id = $id";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql = "delete from $this->table ";
        if(is_array($id)){
            $tmp = $this->arrSql($id);
            $sql .="where ".join(" && ",$tmp);
        }else{
            $sql .="where id = $id";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }
    function ddd(){
        $sql = "delete from $this->table ";
        // echo $sql;
        return $this->pdo->exec($sql);
    }
    function save($array){
        if(isset($array['id'])){
            $id = $array['id'];
            unset($array['id']);
            $tmp = $this->arrSql($array);
            $sql ="update $this->table set";
            $sql .=join(",",$tmp);
            $sql .="where id = $id";
        }else{
            $col = array_keys($array);
            $sql = "insert into $this->table (`".join("`,`",$col)."`)
                                    values ('".join("','",$array)."')";
        }
        return $this->pdo->exec($sql);
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count(...$arg){
        $sql = $this->math('count','*',...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col,...$arg){
        $sql = $this->math('sum',$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function max($col,...$arg){
        $sql = $this->math('max',$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function min($col,...$arg){
        $sql = $this->math('min',$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function avg($col,...$arg){
        $sql = $this->math('avg',$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
}
$Admin = new DB('admin');
$Mem = new DB('mem');
$Goods = new DB('goods');
$Type = new DB('type');
$Ord = new DB('ord');
$Ad = new DB('ad');
$Bottom = new DB('bottom');
$bot = $Bottom->find(1);
