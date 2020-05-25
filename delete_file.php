<?php
include_once "base.php";

$id=$_GET['id'];
// 利用ID找到其他資料
$file=find("file_info",$id);

// 刪除img資料夾裡的圖檔
// unlink(路徑)
unlink($file['path']);

// 刪除資料庫裡的資料
del("file_info",$id);


to("manage.php");
?>