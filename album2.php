<!-- 相簿 -->
<style>
  *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  img{
    width: 100%;
    border: 3px solid orange;
  }
  .frame{
    display: inline-flex;
    align-items: center;
    /* width: 150px;
    height: 150px; */
    margin: 5px;
    padding: 10px;
    border: 2px solid #000;
    box-shadow: 2px 2px 5px #aaa;
    overflow: hidden;
    vertical-align: middle;
  }
</style>

<a href="?album=1">美食</a>
<a href="?album=2">旅遊</a>
<a href="?album=3">寵物</a>
<hr>
<?php
include_once "base.php"; 

if(!empty($_GET['album'])){
  $album=['album'=>$_GET['album']];
}else{
  $album=[];
}

$images=all("file_info",$album);
foreach($images as $img){
  echo "<div class='frame'><a href='img/".$img['filename']."'><img src='thumb/".$img['filename']."'></a></div>";
}

?>