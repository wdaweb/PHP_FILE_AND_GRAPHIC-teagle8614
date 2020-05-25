<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳圖案機制
 * 3.取得圖檔資源
 * 4.進行圖形處理
 *   ->圖形縮放
 *   ->圖形加邊框
 *   ->圖形驗證碼
 * 5.輸出檔案
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>圖形檔案匯入</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">圖形處理練習</h1>
<!---建立檔案上傳機制--->
<form action="graphic3.php" method="post" enctype="multipart/form-data">
	檔案:<input type="file" name="pic" id="img"><br>
	說明:<input type="text" name="note"><br>
	相簿:
	<select name="album" id="">
		<option value="1">美食</option>
		<option value="2">旅遊</option>
		<option value="3">寵物</option>
	</select><br>
	<input type="submit" value="上傳">
</form>

<a href="album1.php">查看相簿1</a><br>
<a href="album2.php">查看相簿2</a><br>

<!----縮放圖形----->


<!----圖形加邊框----->


<!----產生圖形驗證碼----->



</body>
</html>