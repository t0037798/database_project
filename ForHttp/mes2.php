<?php session_start(); ?>
<!DOCTYPE html>               <!--留言完成介面-->
<html>
<head>
<title>Result</title>
</head>
<CENTER>
<body>
<?php
include("mysql_connect.inc.php");
if(isset($_SESSION['Account'])){
	$Account = $_SESSION['Account'];
	$Password = $_SESSION['Password'];
	//搜尋資料庫資料
	$sql = "SELECT * FROM `member` where Account = '$Account'";
	$sql2 = "SELECT * FROM `student` where Account = '$Account'";
	$sql3 = "SELECT * FROM `teacher` where Account = '$Account'";
	$sql4 = "SELECT * FROM `graduate` where Account = '$Account'";
	$sql_S= "SELECT * FROM administrator where Account = '$Account'";
	$result = mysql_query($sql);
	$result2 = mysql_query($sql2);
	$result3 = mysql_query($sql3);
	$result4 = mysql_query($sql4);
	$result_S = mysql_query($sql_S);
	$row = @mysql_fetch_row($result);	
	$row2 = @mysql_fetch_row($result2);
	$row3 = @mysql_fetch_row($result3);
	$row4 = @mysql_fetch_row($result4);
	$row_S = @mysql_fetch_row($result_S);
}
?>
<?php
$MsgTo=$_POST["MsgTo"];
$MsgContent=$_POST["MsgContent"];
date_default_timezone_set ("ASIA/Taipei");
$MsgTime=date("Y:m:d H:i:s");
if (!empty($MsgContent)){
	mysql_query("insert into msgboard value('','$MsgContent','$MsgTo','$MsgTime')");
	$MsgNo=mysql_query("select MAX(MsgNo)
						from msgboard");
	$row_M=@mysql_fetch_row($MsgNo);
	mysql_query("insert into message value('$Account','$row_M[0]')");
	echo"留言成功";
	header("Location: mesboard.php");      //跳轉至留言板
	exit; ?>
	
<?php
}
else{
	echo"留言失敗：內容不得為空白";?>
	<p><a href="mes1.php">回上一頁</a>&nbsp&nbsp&nbsp&nbsp<a href="homepage2.php">回首頁</a></p>
	<?php
}
?>
</body>
</html>