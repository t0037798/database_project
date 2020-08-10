<?php session_start(); ?>
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
if(isset($_SESSION['Account'])){
	$Account = $_SESSION['Account'];
	$Password = $_SESSION['Password'];
	//搜尋資料庫資料
	$sql = "SELECT * FROM `member` where Account = '$Account'";
	$sql2 = "SELECT * FROM `student` where Account = '$Account'";
	$sql3 = "SELECT * FROM `teacher` where Account = '$Account'";
	$sql4 = "SELECT * FROM `graduate` where Account = '$Account'";
	$result = mysql_query($sql);
	$result2 = mysql_query($sql2);
	$result3 = mysql_query($sql3);
	$result4 = mysql_query($sql4);
	$row = @mysql_fetch_row($result);	
	$row2 = @mysql_fetch_row($result2);
	$row3 = @mysql_fetch_row($result3);
	$row4 = @mysql_fetch_row($result4);
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>個人資料填寫</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<CENTER>

  </head>
  <body>
	<h2>個人資料</h2>
	<form method="POST" action="info2.php">
		<p>姓名：<input type="text" name="Name"></p><br>		
		<p>性別：<input type="text" name="Sex"></p><br>
		<?php if($row2[0]) : ?>
			<p>系級：<input type="text" name="DeptLevel"></p><br>	
			<p>學號：<input type="text" name="StdID"></p><br>			
		<?php elseif($row3[0]) : ?>
			<p>辦公室：<input type="text" name="Office"></p><br>
			<p>實驗室：<input type="text" name="Lab"></p><br>				
		<?php endif; ?>
		<p>FB：<input type="text" name="FB"></p><br>
		<p>Line：<input type="text" name="Line"></p><br>	
		<p>Email：<input type="text" name="Email"></p><br>
		<p>連絡電話：<input type="text" name="Phone"></p><br>	
		<?php if($row2[0] && $row[4]=="男") : ?>
			<p><h4>兵役資訊</h4>			
			<select name="Serve">
			　<option value="不公開">不公開</option>
			　<option value="已服役">已服役</option>
			  <option value="服役中">服役中</option>
			　<option value="未服役">未服役</option>
			　<option value="免服役">免服役</option>			
			</select>
			</p><br>									
		<?php endif; ?>
		<?php if($row4[0]) : ?>
			<p><h4>研究所資訊</h4>
			<select name="Institute">
				<option value="公開">公開</option>
				<option value="不公開">不公開</option>			　			  		
			</select></p>
			<p>學校：<input type="text" name="Inst"></p><br>
			<p>系所：<input type="text" name="InstDept"></p>
			<p>學位：<select name="Degree">
			　<option value="碩士">碩士</option>
			　<option value="博士">博士</option>			  		
			</select></p><br>
			
			<p><h4>就業資訊</h4>
			<select name="employment">
				<option value="公開">公開</option>
				<option value="不公開">不公開</option>			　	  		
			</select></p>
			<p>公司：<input type="text" name="Company"></p><br>
			<p>單位/部門：<input type="text" name="CompDept"></p><br>
			<p>職稱：<input type="text" name="Position"></p><br>
		<?php endif; ?>
		<p><input type="submit" value="送出"> <input type="reset" value="清空"></p>
		
	</form>
   


    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>