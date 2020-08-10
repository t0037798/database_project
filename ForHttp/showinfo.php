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
			<li role="presentation"><a href="publish.php">公告</a></li>	
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
	  <div class="col-xs-1 col-sm-1">
	  </div>
	  <div class="col-xs-7 col-sm-7">
	  <?php if(isset($_SESSION['Account'])) : ?> 	<!--假如有留下session-->	  
			 <?php if($row[0] == $Account && $row[1] == $Password) :?><!--有登入的話-->	
			 <br><p><h4>基本資訊</h4></p>
			 <table class="table" width=1>
				<tbody>
		　			<tr>
						<th>姓名</th><td> <?php echo $row[3]?></td>
					</tr>
					<tr>
						<th>性別</th><td> <?php echo $row[4]?></td>
					</tr>					
					<?php if($row2[0]) : ?>
					<tr>
						<th>系級</th><td> <?php if($row2[2]!=0) echo $row2[2]?></td>
					</tr>
					<tr>
						<th>學號</th><td> <?php echo $row2[1]?></td>
					</tr>					
					<?php elseif($row3[0]) : ?>
					<tr>
						<th>辦公室</th><td> <?php echo $row3[1]?></td>
					</tr>
					<tr>
						<th>實驗室</th><td> <?php echo $row3[2]?></td>
					</tr>
					<?php endif; ?>
					<tr>
					　 <th>FB</th><td><?php echo $row[5]?></td>
					</tr>
					<tr> 
						<th>Line</th><td> <?php echo $row[6]?></td>
					</tr>
					<tr>
						<th>Email</th><td> <?php echo $row[7]?></td>
					</tr>
					<tr>
						<th>連絡電話</th><td> <?php echo $row[8]?></td>
					</tr>					
				</tbody> 				
			</table><br>
			<?php if($row2[0] && $row[4]=="男") : ?>
			<p><h4>兵役資訊</h4></p>
			<table class="table" width=1>
				<tbody>
		　			<tr>
						<?php $sql_M = "SELECT `Condition` 
										FROM `militaryservice` 
										where Account in (SELECT `Account` 
														  FROM `student`
														  where `Account`= '$Account')";
							  $result_M = mysql_query($sql_M);
							  $row_M=@mysql_fetch_row($result_M); ?>
						<th>服役情況</th><td> <?php echo $row_M[0]?></td>
					</tr>												
				</tbody> 				
			</table><br>
			<?php endif; ?>
			<?php if($row4[0]) : ?>
			<p><h4>研究所資訊</h4></p>
			<table class="table" width=1>
				<?php $sql_I = "SELECT * 
								FROM `Institute` 
								where Account in (SELECT `Account` 
												  FROM `graduate`
												  where `Account`= '$Account')";
					  $result_I = mysql_query($sql_I);
					  $row_I=@mysql_fetch_row($result_I); ?>
				<tbody>
		　			<tr>
						<th>學校</th><td> <?php echo $row_I[1]?></td>
					</tr>
					<tr>
						<th>系所</th><td> <?php echo $row_I[2]?></td>
					</tr>					
					<tr>
						<th>學位</th><td> <?php echo $row_I[3]?></td>
					</tr>								
				</tbody> 				
			</table>	
			<p><h4>就業資訊</h4></p>
			<table class="table" width=1>
				<?php $sql_E = "SELECT * 
								FROM `employment` 
								where Account in (SELECT `Account` 
												  FROM `graduate`
												  where `Account`= '$Account')";
					  $result_E = mysql_query($sql_E);
					  $row_E=@mysql_fetch_row($result_E); ?>
				<tbody>
		　			<tr>
						<th>公司</th><td> <?php echo $row_E[1]?></td>
					</tr>
					<tr>
						<th>單位/部門</th><td> <?php echo $row_E[2]?></td>
					</tr>					
					<tr>
						<th>職稱</th><td> <?php echo $row_E[3]?></td>
					</tr>								
				</tbody> 				
			</table>
			<?php endif; ?>			
			<button type="button" class="btn btn-default" onclick="self.location.href='information2.php'">更新資料</button>
			<?php else :?>
					<h1>請先登入!!!</h1>
			<?php endif; ?>
			<?php else :?>
				<h2>請先登入!!!!</h2>
		<?php endif; ?>
			 
	  </div>
		<!--內文-->
		 <div class="col-xs-1 col-sm-1">
	  </div>
	  
	  <div class="col-xs-3 col-sm-3">
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
		  
			<!--動態圖片-->
		  <tr><td>
		  <br>
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
				<div class="item active">
				  <img src="image/聖誕節.jpg" alt="聖誕節">
				  <div class="carousel-caption">
					...
				  </div>
				</div>
				<div class="item">
				  <img src="image/聖誕節2.jpg" alt="聖誕節2">
				  <div class="carousel-caption">
					...
				  </div>
				</div>
				...
			  </div>  
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
		  </div>
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