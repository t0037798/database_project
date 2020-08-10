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
	date_default_timezone_set ("ASIA/Taipei");
}
?>
<?php $AllMsg=mysql_query("select InfoNo,AncContent,AncTime,AncTitle 
							from announcement
							order by InfoNo desc"); ?>
<?php $Page = $_GET['Page'] ;
if ($Page == null)
{
	echo '<meta http-equiv=REFRESH CONTENT=0;url=publish.php?Page=1>';
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
			<li role="presentation" class="active"><a href="publish.php?Page=1">公告</a></li>	
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
		<!--內文-->
		<br>
		<h1>可以當畢專的系統上線啦 <small>高大系友會</small></h1>
		

		<?php
		for($i=1 ; $i<$Page ;$i++)
		{
			$rs=mysql_fetch_assoc($AllMsg);
			$rs=mysql_fetch_assoc($AllMsg);
			$rs=mysql_fetch_assoc($AllMsg);
			$rs=mysql_fetch_assoc($AllMsg);
			$rs=mysql_fetch_assoc($AllMsg);
		}			
		?>
		
		<!--摺疊效果-->
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		
		  <?php $rs=mysql_fetch_assoc($AllMsg);  
		  if (!isset($rs["AncContent"]))
		  { 
			  echo "此頁已無文章!";
		  }
		  if ($rs["AncContent"]!="")
		  { 
		  ?>
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading1">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<!--標題1-->
				  <?php echo $rs["AncTitle"] ?>
				  <div style="float:right;"> <?php echo date("Y-m-d H:i:s",strtotime($rs["AncTime"])); ?> </div>
				  <?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
					<?php if($row_S[0]): ?><!--假如是管理員-->
					<div style="text-align:right;"><a href = "delpublish.php?InfoNo=<?php echo $rs["InfoNo"];?>" style="color:red;">刪除公告</a></div>		 
					<?php endif ;?>
				  <?php endif ;?>
				</a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			  <div class="panel-body">
					<!--內文1-->
				<?php echo $rs["AncContent"]; ?>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		  
		  <?php $rs=mysql_fetch_assoc($AllMsg); 
		  if ($rs["AncContent"]!="")
		  { 
		  ?>  
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading2">
			  <h4 class="panel-title">
				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					<!--標題2-->
				  <?php echo $rs["AncTitle"] ?>
				  <div style="float:right;"> <?php echo date("Y-m-d H:i:s",strtotime($rs["AncTime"])); ?> </div>
				  <?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
					<?php if($row_S[0]): ?><!--假如是管理員-->
					<div style="text-align:right;"><a href = "delpublish.php?InfoNo=<?php echo $rs["InfoNo"];?>" style="color:red;">刪除公告</a></div>			 
					<?php endif ;?>
				  <?php endif ;?>
				</a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			  <div class="panel-body">
					<!--內文2-->
				<?php echo $rs["AncContent"]; ?>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		  
		  <?php $rs=mysql_fetch_assoc($AllMsg); 
		  if ($rs["AncContent"]!="")
		  { 
		  ?>  
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading3">
			  <h4 class="panel-title">
				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					<!--標題3-->
				  <?php echo $rs["AncTitle"] ?>
				  <div style="float:right;"> <?php echo date("Y-m-d H:i:s",strtotime($rs["AncTime"])); ?> </div>
				  <?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
					<?php if($row_S[0]): ?><!--假如是管理員-->
					<div style="text-align:right;"><a href = "delpublish.php?InfoNo=<?php echo $rs["InfoNo"];?>" style="color:red;">刪除公告</a></div>	 
					<?php endif ;?>
				  <?php endif ;?>
				</a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			  <div class="panel-body">
					<!--內文3-->
				  <?php echo $rs["AncContent"]; ?>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		
		  <?php $rs=mysql_fetch_assoc($AllMsg); 
		  if ($rs["AncContent"]!="")
		  { 
		  ?>
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading4">
			  <h4 class="panel-title">
				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					<!--標題4-->
				  <?php echo $rs["AncTitle"] ?>
				  <div style="float:right;"> <?php echo date("Y-m-d H:i:s",strtotime($rs["AncTime"])); ?> </div>
				  <?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
					<?php if($row_S[0]): ?><!--假如是管理員-->
					<div style="text-align:right;"><a href = "delpublish.php?InfoNo=<?php echo $rs["InfoNo"];?>" style="color:red;">刪除公告</a></div>	 
					<?php endif ;?>
				  <?php endif ;?>
				</a>
			  </h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
			  <div class="panel-body">
					<!--內文4-->
				  <?php echo $rs["AncContent"]; ?>
			  </div>
			</div>
		  </div>
		  <?php } ?>

		  <?php $rs=mysql_fetch_assoc($AllMsg); 
		  if ($rs["AncContent"]!="")
		  { 
		  ?>
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading5">
			  <h4 class="panel-title">
				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					<!--標題5-->
				  <?php echo $rs["AncTitle"] ?>
				  <div style="float:right;"> <?php echo date("Y-m-d H:i:s",strtotime($rs["AncTime"])); ?> </div>
				  <?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
					<?php if($row_S[0]): ?><!--假如是管理員-->
					<div style="text-align:right;"><a href = "delpublish.php?InfoNo=<?php echo $rs["InfoNo"];?>" style="color:red;">刪除公告</a></div>		 
					<?php endif ;?>
				  <?php endif ;?>
				</a>
			  </h4>
			</div>
			<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
			  <div class="panel-body">
					<!--內文5-->
				  <?php echo $rs["AncContent"]; ?>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		  
		</div>
		<!------------>
		
		<!--頁碼-->
		<nav>
		  <ul class="pagination">
			<li><a href="publish.php?Page=1">1 <span class="sr-only">(current)</span></a></li>
			<li><a href="publish.php?Page=2">2</a></li>
			<li><a href="publish.php?Page=3">3</a></li>
			<li><a href="publish.php?Page=4">4</a></li>
			<li><a href="publish.php?Page=5">5</a></li>
		<nav>
		  </ul>
		</nav>
		
		<?php if(isset($_SESSION['Account'])) : ?><!--假如有留下session-->
			<?php if($row_S[0]): ?><!--假如是管理員-->
					<div style="text-align:right;"><a href="addpublish.php" class="btn btn-primary" role="button">新增公告</a></div>	
			<?php endif ;?>
		<?php endif ;?>
		
	  </div>
	  
	  <div class="col-xs-1 col-sm-1"><!--排版空一行-->
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

