<!-- 直接將檔案覆蓋 -->

<?php
include_once "base.php";

// 於manage.php點擊更新按鈕進入
if(!empty($_GET['id'])){
  $row=find("file_info",$_GET['id']);
}


// 將submit檔案加上同名的name，如果有這個值則代表有更新
if(!empty($_POST['submit'])){
  $id=$_POST['id'];
  // 抓取原本的資料
  $source=find("file_info",$id);

  if(!empty($_FILES['upload']['tmp_name'])){
    switch($_FILES['upload']['type']){
      case "image/jpeg";
        $sub=".jpg";
        break;
      case "image/png";
        $sub=".png";
        break;
      case "image/gif";
        $sub=".gif";
        break;
    }
    
    // 移除原本的檔案
    // unlink($source['path']);

    // 將要更新的內容替換進原本的資料之中
    // $name="img_".date("YmdHis").$sub;
    // $source['filename']=$name;
    // $source['type']=$_FILES['upload']['type'];
    // $source['path']="img/".$name;

    // 在將新上傳的圖檔移入
    // move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name);



    // 副檔名可能不同
    $source['filename']=explode(".",$source['filename'])[0].$sub;
    $source['type']=$_FILES['upload']['type'];
    $source['path']=$_FILES['upload']['path'];
    move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$source['filename']);
  }
  

  $note=$_POST['note']; 
  $source['note']=$note;
  save("file_info",$source);
  to("manage.php");
}

?>
<img src="<?=$row['path'];?>" style="width:200px;">
<!-- 如果這次操作沒有上傳檔案，就認定只需要更新內容，沒有要更換圖檔 -->
<form action="update_file.php" method="post" enctype="multipart/form-data">
	<input type="file" name="upload"><br>
	<input type="text" name="note" value="<?=$row['note'];?>"><br>
	<input type="hidden" name="id" value="<?=$row['id'];?>">
	<input type="submit" name="submit" value="更新">
</form>