<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM member where Account = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
{
        //將姓名寫入session，方便驗證使用者身份
        //$_SESSION['Name'] = $row[3]; //row3為姓名
		$_SESSION['Account'] = $row[0];
		$_SESSION['Password'] = $row[1];
		//$_SESSION['id'] = $row[2];
        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=0;url=homepage2.php>';
}
else
{
        echo '密碼錯誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage2.php>';
}
?>