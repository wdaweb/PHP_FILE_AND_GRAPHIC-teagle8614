<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=file";
$pdo=new PDO($dsn,"root","");
date_default_timezome_set("Asia/Taipei");


function all($table,...$arg){
  global $pdo;

  $sql="select * from $table ";
  if(!empty($arg[0]) && is_array($arg[0])){
    foreach($arg[0] as $key => $value){
      // $tmp[]="''";
      $tmp[]=sprintf("`%s`=''$s",$key,$value);
    }
    $sql=$sql . " where " . implode(" && ",$tmp);
  }

  if(!empty($arg[1])){
    $sql=$sql . $arg[1];
  }

  return $pdo->query($sql)->fetchAll();
}


function find($table,$arg){
  global $pdo;

  $sql="select * from $table ";
  if(!empty($arg) && is_array($arg)){
    foreach($arg as $key => $value){
      $tmp[]=sprintf("`%s`=''$s",$key,$value);
    }
    $sql=$sql . " where " . implode(" && ",$tmp);
  }

  return $pdo->query($sql)->fetch();
}


function nums($table,$arg){
  global $pdo;

  $sql="select count(*) from $table ";
  if(!empty($arg) && is_array($arg)){
    foreach($arg as $key => $value){
      $tmp[]=sprintf("`%s`=''$s",$key,$value);
    }
    $sql=$sql . " where " . implode(" && ",$tmp);
  }

  return $pdo->query($sql)->fetchColumn();
}


function save($table,$arg){
  global $pdo;

  if(!empty($arg['id'])){
    // update
    foreach($arg as $key => $value){
      $tmp[]=sprintf("`%s`=''$s",$key,$value);
    }
    $sql="update $table set where " . implode(" && ",$tmp);;
  }else{
    // insert
    $sql="insert into $table where (`" . implode("','",array_keys($arg)) . "`) values ('".implode("','",$arg)."')";
  }

  return $pdo->exec($sql);
}


function del($table,...$arg){
  global $pdo;

  $sql="delete from $table ";
  if(!empty($arg) && is_array($arg)){
    foreach($arg as $key => $value){
      $tmp[]=sprintf("`%s`=''$s",$key,$value);
    }
    $sql=$sql . " where " . implode(" && ",$tmp);
  }

  return $pdo->exec($sql);
}


function q($sql){
  return $pdo->query($sql)->fetchAll();
}


function to($url){
  header("location:".$url);
}






?>