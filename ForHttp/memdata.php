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
			<li role="presentation" class="active">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				  會員資料 <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
				  	<li role="presentation"><a href="memdata.php">基本資訊</a></li>
					<li role="presentation"><a href="member.php">更換頭像</a></li>
				</ul>
			</li>
			</ul>
		</div>
	  <!-- 選項：如果他們內容有不符合的高度，清除 XS column -->
	  <div class="clearfix visible-xs-block"></div>
	<div class="row">	
	  <div class="col-xs-1 col-sm-1">
	  </div>
	  <div class="col-xs-8 col-sm-8">
		<!--內文-->
		<br>
		<h1>可以當畢專的系統上線啦</h1>
		<p>
		    台北市長柯文哲就任2週年，定調堅持理念、看見改變，不過這改變市民不太領情，柯文哲滿意度吊車尾六都最低，不到40%。不過柯文哲還是拿出他西區門戶計畫，帶動城市翻轉的政績，向市民報告。也說改革總會有陣痛期，不要被民調嚇跑。
		柯市長率領市府團隊高喊口號，展現堅持理念，改變的決心，就職將滿2週年，特地走出市府，來到艋舺開行動市政會議，帶來他上任以來，最滿意政績，西區門戶帶動北市軸線翻轉。<br><br>
		    台北市長柯文哲：「我們來到萬華其實是有深刻的涵義，一府二鹿三艋舺，萬華是台北發展的起源，後來因為城市往東發展，舊城區就沒落了，過去的政府喊軸線翻轉，方向是對的只可惜流於口號。」
		暗批前朝做不到，軸線翻轉也只流於口號，不過柯市長上任拚「改變成真」，信守改革，但民調持續沒起色，花媽陳菊市長滿意度高達70%，反觀柯市長不到四成，還在六都首長吊車尾。<br><br>
		    台北市長柯文哲：「陳菊市長最大的優點就是溫暖，她給人家溫暖大姐那種溫暖的感覺，坦白講這也是很多人講我的缺點，因為我是外科醫生給人家那種冷酷，那種快冷酷的感覺，因為我們以前外科醫生，坦白講CPR差30秒就不要壓了，因為把他救回來變成植物人更慘。」
		柯文哲談民調，說陳菊市長很溫暖，滿意度相對高，自比他外科醫生性格，做事喜歡搶快的快人快語風格，可能因此影響民調。<br><br>
		    台北市長柯文哲：「講話快本來就是我的缺點，民調當然還是要看啦，但是每天看民調的結果，就是看報治國最後就會變得什麼事都不敢做。」<br><br>
		強調改革總會有陣痛期，自認魄力不會被民調牽著走，綁手綁腳成不了事，柯P對施政還是有滿滿信心。（民視新聞曾偉旻、謝政霖、SNG台北報導）<br><br>
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

