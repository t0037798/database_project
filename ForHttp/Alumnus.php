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
<!--html-->
<!DOCTYPE html>
<html lang="zh-Hant">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>高大校友資訊網</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	
  </head>
  
  <body>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12">	
			<img src="image/TopBar.png" class="img-responsive" alt="Responsive image">
		</div>
	</div>
	<div class="row">
	  <div class="col-xs-12 col-sm-12">	
			<!--選單-->
			<ul class="nav nav-tabs">
			<li role="presentation"><a href="homepage2.php">首頁</a></li>
			<li role="presentation"><a href="publish.php?Page=1">公告</a></li>	
			<li role="presentation"><a href="activity.php?Page=1">活動記錄</a></li>			
			<li role="presentation"><a href="mesboard.php">留言版</a></li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				  系友資訊 <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
				  	<li role="presentation"><a href="Alumnus.php">畢業校友</a></li>
					<li role="presentation"><a href="teacher.php">教師</a></li>					
				</ul>
			</li>
			<?php if(isset($_SESSION['Account'])) : ?> 	<!--假如有留下session-->
	  
				<?php if($row[0] == $Account && $row[1] == $Password) :?><!--有登入的話-->	
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				  個人資料 <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
				  	<li role="presentation"><a href="showinfo.php">基本資訊</a></li>
					<li role="presentation"><a href="member.php">更換頭像</a></li>					
				</ul>
			</li>
				<?php endif; ?>
			<?php endif; ?>
			
			</ul>
		</div>
	  <!-- 選項：如果他們內容有不符合的高度，清除 XS column -->
	  <div class="clearfix visible-xs-block"></div>
	<div class="row">	
	  <div class="col-xs-1 col-sm-1"><br>
	  <h5><strong>系級</strong></h5>
	   <ul class="nav nav-pills nav-stacked" role="tablist">
		<li role="presentation" class="active"><a href="#105" aria-controls="105" role="tab" data-toggle="tab" >105</a></li>
		<li role="presentation"><a href="#104" aria-controls="104" role="tab" data-toggle="tab" >104</a></li>
		<li role="presentation"><a href="#103" aria-controls="103" role="tab" data-toggle="tab" >103</a></li>
		<li role="presentation"><a href="#102" aria-controls="102" role="tab" data-toggle="tab" >102</a></li>
		<li role="presentation"><a href="#101" aria-controls="101" role="tab" data-toggle="tab" >101</a></li>
		<li role="presentation"><a href="#100" aria-controls="100" role="tab" data-toggle="tab" >100</a></li>
		<li role="presentation"><a href="#99" aria-controls="99" role="tab" data-toggle="tab" >99</a></li>
		<li role="presentation"><a href="#98" aria-controls="98" role="tab" data-toggle="tab" >98</a></li>
		<li role="presentation"><a href="#97" aria-controls="97" role="tab" data-toggle="tab" >97</a></li>
	  </ul>
	  
	  </div>
	  <div class="col-xs-9 col-sm-9">	  
		
	<div role="tabpanel"> <!-- Nav tabs --> 
	<?php 
	$AllMem=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='105')
						order by `JoinTime`");
	?>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="105">
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem) ; $i++){
			$rs=mysql_fetch_assoc($AllMem); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs["Name"];?></td>
		 　 <td><?php echo $rs["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs["Email"];?></td>
		 　 <td><?php echo $rs["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs["InstName"].'<br>';
																echo ''.$rs["DeptName"].'<br>';
																echo $rs["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs["Company"].'<br>';
																echo $rs["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
    <div role="tabpanel" class="tab-pane" id="104">
	<?php 
	$AllMem2=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='104')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem2) ; $i++){
			$rs2=mysql_fetch_assoc($AllMem2); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs2["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs2["Name"];?></td>
		 　 <td><?php echo $rs2["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs2["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs2["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs2["Email"];?></td>
		 　 <td><?php echo $rs2["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs2["InstName"].'<br>';
																echo ''.$rs2["DeptName"].'<br>';
																echo $rs2["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs2["Company"].'<br>';
																echo $rs2["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
    <div role="tabpanel" class="tab-pane" id="103">
	<?php 
	$AllMem3=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='103')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem3) ; $i++){
			$rs3=mysql_fetch_assoc($AllMem3); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs3["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs3["Name"];?></td>
		 　 <td><?php echo $rs3["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs3["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs3["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs3["Email"];?></td>
		 　 <td><?php echo $rs3["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs3["InstName"].'<br>';
																echo ''.$rs3["DeptName"].'<br>';
																echo $rs3["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs3["Company"].'<br>';
																echo $rs3["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
    <div role="tabpanel" class="tab-pane" id="102">
	<?php 
	$AllMem4=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='102')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem4) ; $i++){
			$rs4=mysql_fetch_assoc($AllMem4); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs4["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs4["Name"];?></td>
		 　 <td><?php echo $rs4["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs4["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs4["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs4["Email"];?></td>
		 　 <td><?php echo $rs4["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs4["InstName"].'<br>';
																echo ''.$rs4["DeptName"].'<br>';
																echo $rs4["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs4["Company"].'<br>';
																echo $rs4["Position"];?></td>			
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
	 <div role="tabpanel" class="tab-pane" id="101">
	<?php 
	$AllMem5=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='101')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem5) ; $i++){
			$rs5=mysql_fetch_assoc($AllMem5); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs5["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs5["Name"];?></td>
		 　 <td><?php echo $rs5["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs5["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs5["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs5["Email"];?></td>
		 　 <td><?php echo $rs5["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs5["InstName"].'<br>';
																echo ''.$rs5["DeptName"].'<br>';
																echo $rs5["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs5["Company"].'<br>';
																echo $rs5["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
	 <div role="tabpanel" class="tab-pane" id="100">
	<?php 
	$AllMem6=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='100')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem6) ; $i++){
			$rs6=mysql_fetch_assoc($AllMem6); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs6["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs6["Name"];?></td>
		 　 <td><?php echo $rs6["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs6["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs6["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs6["Email"];?></td>
		 　 <td><?php echo $rs6["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs6["InstName"].'<br>';
																echo ''.$rs6["DeptName"].'<br>';
																echo $rs6["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs6["Company"].'<br>';
																echo $rs6["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
	 <div role="tabpanel" class="tab-pane" id="99">
	<?php 
	$AllMem7=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='99')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem7) ; $i++){
			$rs7=mysql_fetch_assoc($AllMem7); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs7["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs7["Name"];?></td>
		 　 <td><?php echo $rs7["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs7["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs7["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs7["Email"];?></td>
		 　 <td><?php echo $rs7["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs7["InstName"].'<br>';
																echo ''.$rs7["DeptName"].'<br>';
																echo $rs7["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs7["Company"].'<br>';
																echo $rs7["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
	 <div role="tabpanel" class="tab-pane" id="98">
	<?php 
	$AllMem8=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='98')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem8) ; $i++){
			$rs8=mysql_fetch_assoc($AllMem8); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs8["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs8["Name"];?></td>
		 　 <td><?php echo $rs8["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs8["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs8["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs8["Email"];?></td>
		 　 <td><?php echo $rs8["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs8["InstName"].'<br>';
																echo ''.$rs8["DeptName"].'<br>';
																echo $rs8["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs8["Company"].'<br>';
																echo $rs8["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
	 <div role="tabpanel" class="tab-pane" id="97">
	<?php 
	$AllMem9=mysql_query("select * 
						from member m natural left outer join institute i natural left outer join employment e
						where m.`Account` in (select s.`Account`
						from `student` s
						where `DeptLevel`='97')
						order by `JoinTime`");
	?>
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>
			<th>研究所</th>
			<th>就職</th>
			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($AllMem9) ; $i++){
			$rs9=mysql_fetch_assoc($AllMem9); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs9["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs9["Name"];?></td>
		 　 <td><?php echo $rs9["Sex"];?></td>
		 　 <td width="100" style="word-break:break-all"><?php echo $rs9["FB"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs9["Line"];?></td>
			<td width="100" style="word-break:break-all"><?php echo $rs9["Email"];?></td>
		 　 <td><?php echo $rs9["Phone"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs9["InstName"].'<br>';
																echo ''.$rs9["DeptName"].'<br>';
																echo $rs9["Degree"];?></td>
			<td width="100" style="word-break:break-all"><?php 	echo ''.$rs9["Company"].'<br>';
																echo $rs9["Position"];?></td>				
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>
  </div>

</div>
			
	  </div>
		<!--內文-->
	  
	  <div class="col-xs-2	  col-sm-2">
		  <!--右欄位-->
		  
		  <table class="table">
		  <tr><td>
		  <br><a href="http://www.nuk.edu.tw/bin/home.php"><img src="image/logo.jpg" class="img-responsive" alt="Responsive image"></a><br>
		  </td><tr>
		  
		  
		  <!--登入-->
		  <tr><td>
		  <?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
			<h3>hi! <?php echo $_SESSION['Account'] ?></h3>
			<?php if($row_S[0]!=null) : ?>
				<h4>尊爵高貴不凡的管理員<?php echo $row_S[1] ?>號</h4>
			<?php endif ?>
			<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="location.href='logout.php'">
			  登出
			</button>
			<br>
		  <?php else : ?><!--假如沒有，顯示登入頁面-->
			<form name="form" method="post" action="connect.php">
			  <div class="form-group">
				<label for="exampleInputEmail1">帳號</label>
				<input type="text" class="form-control" name="id" placeholder="輸入帳號">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">密碼</label>
				<input type="Password" class="form-control" name="pw" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-primary">送出</button>		
			  <button type="botton" class="btn btn-default" onClick="fun()">註冊</button>
				<script language="javascript"> 
					function fun(){				
						document.forms[0].action='register.php'; 
					}          
				</script>			  
			</form>			
			
		  <br>
		  <?php endif; ?>
		  </td></tr>
		  
			
		   </table>
	  </div>  
	<div class="row">	
	  <div class="col-xs-12 col-sm-12">
		<br>
		<img src="image/BottomBar.png" class="img-responsive" alt="Responsive image">
	  </div>
		  
	  </div>
	</div>
</div>
    

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>