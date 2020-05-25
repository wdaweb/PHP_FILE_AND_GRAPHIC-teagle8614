<!-- 上傳圖片(擷取中心正方形範圍+白邊) -->
<?php
include_once "base.php";

/**
 * php GD
 * https://www.php.net/manual/en/book.image.php
 */
// 用empty或error 都可以判斷檔案是否上傳成功
// if(!empty($_FILES['pic']['tmp_name']))
if($_FILES['pic']['error']==0){  // error=0 表示沒有發生錯誤

  switch($_FILES['pic']['type']){
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
  $name="thumb_".date("Ymdhis").$sub;

  move_uploaded_file($_FILES['pic']['tmp_name'],"img/".$name);

  $data=[
    'filename'=>$name,
    'type'=>$_FILES['pic']['type'],
    'note'=>$_POST['note'],
    'album'=>$_POST['album'],
    'path'=>'img/'.$name
  ];

  save('file_info',$data);



  // php對graphic不會有錯誤訊息，除非裝插件
  $thumb_path="thumb/".$name;
  $source_path="img/".$name;
  // getimagesize 出來結果會是陣列
  $img_info=getimagesize($source_path);


  // $img_info[0]:圖片寬度、$img_info[1]:圖片高度、$img_info[bits]:顏色、$img_info[channels]:通道、$img_info[mime]:檔案類型
  echo "<pre>";print_r($img_info);echo "</pre>";

  $rate=0.2; //縮放比率
  $border=5; //白邊的寬度
  // 以短邊為基準，長邊的正中心
  if($img_info[0]>$img_info[1]){
    // 高小於寬
    $src_x=($img_info[0]-$img_info[1])/2;
    $src_y=0;
    $src_w=$img_info[1];
    $src_h=$img_info[1];
    $img_w=$img_info[1]*$rate;
    $img_h=$img_info[1]*$rate;

  }else if($img_info[0]<$img_info[1]){
    // 寬小於高
    $src_x=0;
    $src_y=($img_info[1]-$img_info[0])/2;
    $src_w=$img_info[0];
    $src_h=$img_info[0];
    $img_w=$img_info[0]*$rate;
    $img_h=$img_info[0]*$rate;

  }else{
    // 寬高相等$img_info[0]、$img_info[1]都可
    $src_x=$img_info[0];
    $src_y=$img_info[0];
    $src_w=$img_info[0];
    $src_h=$img_info[0];
    $img_w=$img_info[0]*$rate;
    $img_h=$img_info[0]*$rate;
  }


  // imagecreatetruecolor(寬,高):建立新畫布(彩色)
  $thumb_img=imagecreatetruecolor($img_w,$img_h);
  // imagecolorallcate(圖片,R,G,B)
  $white=imagecolorallocate($thumb_img,255,255,255);
  // 將整張圖填滿白色
  imagefill($thumb_img,0,0,$white);
  
  

  // 依照圖片類型來開不同類型的畫布
  switch($img_info['mime']){
    case "image/jpeg";
      $source_img=imagecreatefromjpeg($source_path);
      break;
    case "image/png";
      $source_img=imagecreatefrompng($source_path);
      break;
    case "image/gif";
      $source_img=imagecreatefromgif($source_path);
      break;
  }
  // imagecopyresampled(目的地圖片，來源圖片,目的地的X座標,目的地的Y座標,來源的X座標,來源的Y座標,目的地的寬,目的地的高,來源的寬,來源的高):取樣
  imagecopyresampled($thumb_img,$source_img,$border,$border,$src_x,$src_y,$img_w-$border*2,$img_h-$border*2,$src_w,$src_h);
  switch($img_info['mime']){
    case "image/jpeg";
      // imagejpeg(來源,縮圖檔路徑)
      imagejpeg($thumb_img,$thumb_path);
      break;
    case "image/png";
      imagepng($thumb_img,$thumb_path);
      break;
    case "image/gif";
      imagegif($thumb_img,$thumb_path);
      break;
  }


  header("location:image.php?");
}

?>