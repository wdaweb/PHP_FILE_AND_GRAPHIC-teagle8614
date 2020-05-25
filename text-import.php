<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>文字檔案匯入</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">文字檔案匯入練習</h1>
<!---建立檔案上傳機制--->
<form action="parse_file.php" method="post" enctype="multipart/form-data" style="margin:auto;width:300px;border:1px solid #333;">
	<input type="file" name="doc">
	<input type="submit" var="匯入">
</form>



<!----讀出匯入完成的資料----->
<?php
	include "base.php";
	$todo=all("todo_list","","",PDO::FETCH_ASSOC);
?>
<br><br>
<table border='1'>
	<tr>
		<td>id</td>
		<td>subject</td>
		<td>description</td>
		<td>create_date</td>
		<td>due_date</td>
	</tr>
	<?php
		foreach($todo as $t){
	?>
		<tr>
			<td><?=$t['id']?></td>
			<td><?=$t['subject']?></td>
			<td><?=$t['description']?></td>
			<td><?=$t['create_date']?></td>
			<td><?=$t['due_date']?></td>
		</tr>
	<?php	
	}
	?>
</table>

<?php
	//每次跑完都會將內容匯出成文件
	$newfile=fopen('todolist.txt','w+');
	foreach($todo as $t){
		// fwrite($newfile,$t['subject']."\n");
		// fwrite($newfile,$t['description']);
		// fwrite($newfile,$t['create_date']);
		// fwrite($newfile,$t['due_date']);

		// 在sql沒有設定FETCH會變成跑兩次
		fwrite($newfile,implode(',',$t)."\n");
	}
	fclose($newfile);

?>

<br>
<a href="dotolist.txt" download>下載</a>



</body>
</html>