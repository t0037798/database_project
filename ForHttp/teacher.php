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
	  <div class="col-xs-10 col-sm-10">  
			
	<div role="tabpanel"> <!-- Nav tabs --> 
	<?php 
	$teacher=mysql_query("select * 
						from member natural left join teacher
						where `Account` in (select `Account`
											from `teacher`
											)
						order by `JoinTime`");
	?>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="老師">
	<table class="table">
		<tbody>
		<tr>
			<th>個人照片</th>
			<th>姓名</th>
		　　<th>性別</th>
			<th>辦公室</th>
			<th>實驗室</th>
		　　<th>FB</th>
			<th>Line</th>
			<th>Email</th>
			<th>連絡電話</th>			
	 　 </tr>
		<?php 
		for($i=1 ; $i<=mysql_num_rows($teacher) ; $i++){
			$rs=mysql_fetch_assoc($teacher); 
		?>
		<tr>		
			<td><?php echo '<img width=75 src="memberpicture/'.$rs["Photo"].'" class="img-responsive" alt="Responsive image">'; ?></td>
			<td><?php echo $rs["Name"];?></td>
		 　 <td><?php echo $rs["Sex"];?></td>
			<td><?php echo $rs["Office"];?></td>
			<td><?php echo $rs["Lab"];?></td>
		 　 <td><?php echo $rs["FB"];?></td>
			<td><?php echo $rs["Line"];?></td>
			<td><?php echo $rs["Email"];?></td>
		 　 <td><?php echo $rs["Phone"];?></td>			
		</tr>
		<?php } ?>
		</tbody> 		
	</table></div>    
  </div>

</div>
			
	  </div>
		<!--內文-->
		
	  
	  <div class="col-xs-2 col-sm-2">
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