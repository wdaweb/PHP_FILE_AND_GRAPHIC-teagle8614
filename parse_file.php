<?php
include_once "base.php";

// fopen
// https://stockwfj3.pixnet.net/blog/post/115245280
// php 檔案處理 函式
// http://www.jollen.org/php/jollen_php_book_69.html

if(!empty($_FILES['doc']['tmp_name'])){
  // echo "上傳的暫存檔名及路徑:".$_FILES['doc']['tmp_name']."<br>"; //不管甚麼類型都會為.tmp
  // echo "檔案類型:".$_FILES['doc']['type']."<br>";
  // echo "檔案原始名稱:".$_FILES['doc']['type']."<br>";

  // move_uploaded_file($_FILES['doc']['tmp_name'],"doc/".$_FILES['doc']['name']);
  // echo "檔案搬移位置在:"."doc/".$_FILES['doc']['name']."<br>";


  if($_FILES['doc']['type']=='text/plain'){
    move_uploaded_file($_FILES['doc']['tmp_name'],"doc/".$_FILES['doc']['name']);
    $path='doc/'.$_FILES['doc']['name'];
    
    // 若上傳的文字是亂碼應該是編碼的問題
    // 先將文字檔丟入vscode按右下角的編碼(utf-8) > 以編碼重新命名 > Big-5 即會顯示正常
    // 但要將文字改為utf-8 再按右下角的編碼(big-5) > 以編碼儲存 > utf-8
    // 若是部分微軟的文件軟體顯示 ex: wordPad開啟 則要設定為 utf-8 with BOM

    $file=fopen($path,"r+");

    // 先讓他執行第一行，略過title
    // 若是在代辦事項.txt 將第一行的title刪除，則要將這行刪除
    // 也可以用指針的方式跳過第一行title來處理
    $txt=fgets($file);
    $num=0;
    // 若沒有到檔案的結尾時
    while(!feof($file)){
      // fgets是一次一行
      $txt=fgets($file);

      $tmp=explode(",",$txt);
      // 以防文件最後多一個空白而造成失誤
      if(count($tmp)==4){
        echo "<pre>";print_r($tmp);echo "</pre>";
        // 要將陣列改為此格式['subject' => $content[0], 'description' => $content[1].....]
        $content['subject']=$tmp[0];
        $content['description']=$tmp[1];
        $content['create_date']=$tmp[2];
        $content['due_date']=$tmp[3];
        
        save("todo_list", $content);
        $num++;
        echo "已儲存".$num."筆資料<br>";
      }
    }

    // 導回上傳頁
    to("text-import.php");

  }else{
    // 不是純文字類型的文件就顯示錯誤
    echo "檔案類型錯誤!";
  }
}else{
  echo "上傳錯誤:".$_FILES['doc']['error'];
}





?>