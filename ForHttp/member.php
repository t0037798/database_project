<?php session_start(); ?>
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
if(isset($_SESSION['Account'])){
	$Account = $_SESSION['Account'];
	$Password = $_SESSION['Password'];
	//搜尋資料庫資料
	$sql = "SELECT * FROM member where Account = '$Account'";
	$sql_S= "SELECT * FROM administrator where Account = '$Account'";
	$result = mysql_query($sql);
	$result_S = mysql_query($sql_S);
	$row = @mysql_fetch_row($result);
	$row_S = @mysql_fetch_row($result_S);
}
?>

<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
if(isset($_SESSION['Account'])){
	$Account = $_SESSION['Account'];
	$Password = $_SESSION['Password'];
	//搜尋資料庫資料
	$sql = "SELECT * FROM member where Account = '$Account'";
	$result = mysql_query($sql);
	$row = @mysql_fetch_row($result);
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
	  <div class="col-xs-1 col-sm-1">
	  </div>
	  
	  <!--大頭貼-->
	  <div class="col-xs-2 col-sm-2">
		<br>
		<br>
		<?php 
		if(isset($_SESSION['Account'])){ //有登入的話
			 if($row[0] == $Account && $row[1] == $Password) :
				 echo '<img src="memberpicture/'.$row[10].'" class="img-responsive" alt="Responsive image">';//叫出大頭貼 
			 else :
				echo 'error';
			 endif; 
		}
		?>
	  </div>
	  
	  <div class="col-xs-6 col-sm-6">
		<!--傳檔系統-->
		<br>
		<h1>可以當畢專的系統上線啦 <small>高大系友會</small></h1>	
		<?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
		<p>
			<?php if($row[0] == $Account && $row[1] == $Password) :?><!--有登入的話-->
				<form action="" method="post" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="exampleInputFile">上傳照片</label>
					<input type="file" id="exampleInputFile" name="myfile">
					<p class="help-block">請上傳jpg、jpeg、png等圖檔，別給我亂傳。</p>
				  </div>
				  <button type="submit" class="btn btn-primary">送出</button>
				</form>
			<?php else :?>
					echo '請登入!';
			<?php endif; ?>
			
			<?php
			//檢查上傳檔案是否有錯誤
			if (isset($_FILES["myfile"]["error"])) {
				//檢查是否有上傳檔案
				if(!empty($_FILES["myfile"]["name"])) {
					//顯示上傳的檔案名稱
					echo "FileName:".$_FILES["myfile"]["name"]."<br>";
					//顯示上傳檔案的Content-Type
					echo "Content-Type:".$_FILES["myfile"]["type"]."<br>";
					//顯示檔案大小
					echo "FileSize:".$_FILES["myfile"]["size"]."<br>";
					echo "<hr>";
					//搬移上傳的檔案
					$id = $_SESSION['Account'];
					$dot ='.'.pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);//取得檔案附檔名
					$SaveDocName = $id.$dot;
					//move_uploaded_file($_FILES["myfile"]["tmp_name"],'memberpicture/'.$_FILES["myfile"]["name"]);
					move_uploaded_file($_FILES["myfile"]["tmp_name"],'memberpicture/'.$SaveDocName);
										
					$sql = "UPDATE `member` SET `Photo` = '$SaveDocName' WHERE `Account` = '$id'";
					$result = mysql_query($sql);
					echo '<meta http-equiv=REFRESH CONTENT=0;url=member.php>';//上傳成功後重整網頁
				}
			}
			?>
			<?php else : ?><!--假如沒有，顯示登入頁面-->
				<?php echo '請先登入'?>
			<?php endif; ?>
		</p>
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
			<h3>hi!<?php echo $_SESSION['Account']?></h3>
			<?php if($row_S[0]!=null) : ?>
				<h4>尊爵高貴不凡的管理員<?php echo $row_S[1] ?>號</h4>
			<?php endif ?>
			<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="location.href='logout.php'">
			  登出
			</button>
			<br><br>
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

