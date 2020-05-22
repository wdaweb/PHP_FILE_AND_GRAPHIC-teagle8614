<?php

$dsn="mysql:host=localhost;chatset=utf8;dbname=file";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");


// 先打出all後 下面的幾乎都可以用all來改
function all($table,...$arg){
  global $pdo;

  $sql="select * from $table ";
  if(!empty($arg[0]) && is_array($arg[0])){
    foreach($arg[0] as $key => $value){
      // $tmp[]="`$key`=''$value";
      $tmp[]=sprintf("`%s`='%s'",$key,$value);
    }
    $sql=$sql . " where " . implode(" && ",$tmp);
  }

  if(!empty($arg[1])){
    $sql=$sql . $arg[1];
  }

  return $pdo->query($sql)->fetch();
}


function find($table,$arg){
  global $pdo;

  $sql="select * from $table ";
  if(!empty($arg) && is_array($arg)){
    foreach($arg as $key => $value){
      $tmp[]=sprintf("`%s`='%s'",$key,$value);
    }
    $sql=$sql . " where " . implode(" && ",tmp);
  }else{
    $sql=$sql . " where id='" . $arg."'";
  }

  return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}


function nums($table,$arg){
// function nums($table,...$arg){
  global $pdo;

  $sql="select count(*) from $table ";
  if(!empty($arg) && is_array($arg)){
    foreach($arg as $key => $value){
      // $tmp[]="`$key`=''$value";
      $tmp[]=sprintf("`%s`='%s'",$key,$value);
    }
    $sql=$sql . " where " . implode(" && ",tmp);
  }

  // 可以不需要
  // if(!empty($arg[1])){
  //   $sql=$sql . $arg[1];
  // }

  return $pdo->query($sql)->fetchColumn();
}


function save($table,$arg){
  global $pdo;

  if(!empty($arg['id'])){
    // update
    foreach($arg as $key => $value){
      if($key!="id"){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
    }
    $sql="update $table set " . implode(",",$tmp) . "where id='".$arg['id']."'";
  }else{
    // insert
    $sql="insert into $table (`".implode("`,`",array_keys($arg))."`) values('".implode("','",$arg)."')";

  }
  
  return $pdo->exec($sql);
}


function del($table,$arg){
  global $pdo;

  $sql="delete from $table ";
  if(!empty($arg) && is_array($arg)){
    foreach($arg as $key => $value){
      $tmp[]=sprintf("`%s`='%s'",$key,$value);
    }
    $sql=$sql . " where ".implode(" && ",tmp);
  }else{
    $sql=$sql . " where id='" . $arg."'";
  }

  return $pdo->exec($sql);
}
function q($sql){
  global $pdo;
  return $pdo->query($sql)->fetchAll();

}
function to($url){
  header("location:".$url);
}

?>