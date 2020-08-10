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
	  <div class="col-xs-8 col-sm-8">
	  <h2>個人資料</h2>
	<form method="POST" action="info2.php" name="Info">
		<p>姓名：<input type="text" name="Name" value="<?php echo $row[3] ?>"></p><br>		
		<p>性別：
		<select name="Sex" onclick='display(this.selectedIndex)'>
				<option value="請選擇">請選擇</option>
				<option value="男" <?php if($row[4]=="男") :?>selected <?php endif;?>>男</option>
				<option value="女" <?php if($row[4]=="女") :?>selected <?php endif;?>>女</option>	
		</select></p><br>	
		<?php if($row2[0]) : ?>
			<p>系級：<input type="text" name="DeptLevel" value="<?php echo $row2[2] ?>"></p><br>	
			<p>學號：<input type="text" name="StdID" value="<?php echo $row2[1] ?>"></p><br>			
		<?php elseif($row3[0]) : ?>
			<p>辦公室：<input type="text" name="Office" value="<?php echo $row3[1] ?>"></p><br>
			<p>實驗室：<input type="text" name="Lab" value="<?php echo $row3[2] ?>"></p><br>				
		<?php endif; ?>
		<p>FB：<input type="text" name="FB" value="<?php echo $row[5] ?>"></p><br>
		<p>Line：<input type="text" name="Line" value="<?php echo $row[6] ?>"></p><br>	
		<p>Email：<input type="text" name="Email" value="<?php echo $row[7] ?>"></p><br>
		<p>連絡電話：<input type="text" name="Phone" value="<?php echo $row[8] ?>"></p><br>	
		<?php if($row2[0]) : ?>
		<div  id="d1" style="display:none;">
			<p><h4>兵役資訊</h4>			
			<select name="Serve">
			　<option value="不公開">不公開</option>
			　<option value="已服役">已服役</option>
			  <option value="服役中">服役中</option>
			　<option value="未服役">未服役</option>
			　<option value="免服役">免服役</option>			
			</select>
			</p><br>									
		</div>
		<?php endif; ?>
		<?php if($row4[0]) : ?>		
		<?php 
		$sql_I = "SELECT * FROM `institute` where Account = '$Account'";
		$sql_E = "SELECT * FROM `employment` where Account = '$Account'";	
		$result_I = mysql_query($sql_I);
		$result_E = mysql_query($sql_E);
		$row_I = @mysql_fetch_row($result_I);	
		$row_E = @mysql_fetch_row($result_E);	?>
			<p><h4>研究所資訊</h4>
			<select name="Institute" onclick='display2(this.selectedIndex)'>
				<option value="公開" <?php if($row_I) :?>selected <?php endif;?>>公開</option>
				<option value="不公開" <?php if(!$row_I) :?>selected <?php endif;?>>不公開</option>			　			  		
			</select></p>
		<div id="d2" style="display:"";">
			<p>學校：<input type="text" name="Inst" value="<?php echo $row_I[1] ?>"></p><br>
			<p>系所：<input type="text" name="InstDept" value="<?php echo $row_I[2] ?>"></p>
			<p>學位：<select name="Degree" >
			　<option value="碩士" <?php if($row_I[3]=="碩士") :?>selected <?php endif;?>>碩士</option>
			　<option value="博士" <?php if($row_I[3]=="博士") :?>selected <?php endif;?>>博士</option>			  		
			</select></p><br>	
		</div>		
			<p><h4>就業資訊</h4>
			<select name="employment"  onclick='display3(this.selectedIndex)'>
				<option value="公開" <?php if($row_E) :?>selected <?php endif;?>>公開</option>
				<option value="不公開" <?php if(!$row_E) :?>selected <?php endif;?>>不公開</option>			　	  		
			</select></p>
		<div id="d3" style="display:"";">
			<p>公司：<input type="text" name="Company" value="<?php echo $row_E[1] ?>"></p><br>
			<p>單位/部門：<input type="text" name="CompDept" value="<?php echo $row_E[2] ?>"></p><br>
			<p>職稱：<input type="text" name="Position" value="<?php echo $row_E[3] ?>"></p><br>
		</div>	
		<?php endif; ?>
		<p><input type="submit" value="送出"> <input type="reset" value="清空"></p>
		<script language="javascript"> 
		function display(id){				
			if(id=='1'){				
				d1.style.display="";
			}else{
				d1.style.display="none";
			}
		}		
		</script>	
		<script language="javascript"> 
		function display2(id){				
			if(id=='0'){				
				d2.style.display="";
			}else{
				d2.style.display="none";
			}
		}		
		</script>		
		<script language="javascript"> 
		function display3(id){				
			if(id=='0'){				
				d3.style.display="";
			}else{
				d3.style.display="none";
			}
		}		
		</script>				
	</form>
	  </div>
		<!--內文-->
		
	  
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