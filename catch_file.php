<?php

// $_FILES為二維陣列
echo "<pre>"; print_r($_FILES); echo "</pre>";
echo $_FILES['upload']['name'];
date_default_timezone_set("Asia/Taipei");
// name: 原本上傳的名字
// type: 上傳格式
// tmp_name: 暫存檔案
// error: 是否上傳成功
// size: 大小(byte)


// 用empty或error 都可以判斷檔案是否上傳成功
// if(!empty($_FILES['upload']['tmp_name']))
if($_FILES['upload']['error']==0){  // error=0 表示沒有發生錯誤

  // 判斷上傳的類型(副檔名)
  // 亦可以用 $sub=explode('.',$_FILES['upload']['name']) 將副檔名分開 => 形成陣列["image01","jpg"] => 用$sub[1]抓出副檔名
  // 可縮寫為 $sub=explode('.',$_FILES['upload']['name'])[1]
  // 但可能會有風險
  // (1)若上傳的檔案沒有副檔名可能就會有問題
  // (2)若檔名有 "." 時 (可以抓最後一個解決此問題)
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

  // 將上傳的檔名以時間命名+副檔名
  $name=date("Ymshis").$sub;


  // move_uploaded_file(原檔案,想要搬至的位置,): 更改上傳的地方
  // move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$_FILES['upload']['name']);
  // 將圖片上傳至同資料夾的"img"內，並將檔案重新命名成上傳時間
  move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name);
}

header("location:upload.php?filename=$name");

?>

<!-- 雖然有抓到檔案(右鍵原始檔看)，但是副檔名為tmp，因此不會顯示 -->
<!-- <img src="<?=$_FILES['upload']['tmp_name'];?>" alt=""> -->
<!-- <img src="img/<?=$_FILES['upload']['name'];?>" alt=""> -->