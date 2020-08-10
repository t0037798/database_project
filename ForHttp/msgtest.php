<?php session_start(); ?>
<!DOCTYPE html>         <!--管理員用(可刪除留言)-->
<html>
<head>
<title>留言紀錄</title>
<CENTER>
<?php
include("mysql_connect.inc.php");
$data=mysql_query("select m.MsgNo,m.MsgContent,m.MsgTo,m.MsgTime,me.Name
from msgboard m,member me
where m.MsgFrom=me.Account
order by MsgNo");
?>
</head>

<body>
<?php
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
for($i=1;$i<=mysql_num_rows($data);$i++){
	$rs=mysql_fetch_assoc($data);
?>
<table border=1>
<tbody>
　 <tr>
	 <th>留言編號</th>
　　 <th>留言對象</th>
　　 <th>留言內容</th>
	 <th>留言來自</th>
	 <th>留言時間</th>
	
	 <th><a href = "del.php?MsgNo=<?php echo $rs["MsgNo"];?>">刪除留言</a></th>
	 
　 </tr>
	<tr>
	 <td><?php echo $rs["MsgNo"];?></td>
　　 <td><?php echo $rs["MsgTo"];?></td>
　　 <td><?php echo $rs["MsgContent"];?></td>
	 <td><?php echo $rs["Name"];?></td>
	 <td><?php echo $rs["MsgTime"];?></td>
　 </tr>
</tbody>
</table>
<?php }?>
<CENTER>
<p><a href = "mes1.php">新增留言</a></p>
</CENTER>
</body>
</html>