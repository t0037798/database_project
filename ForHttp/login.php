<?php
mysql_connect("localhost","root","7434961z");
mysql_select_db("project");
mysql_query("set names utf8");
$data =mysql_query("select * from login");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="guestaccount">帳號</label>
    <input type="text" name="guestaccount" id="guestaccount" />
  </p>
  <p>
    <label for="guestpassword">密碼</label>
    <input type="text" name="guestpassword" id="guestpassword" />
  </p>
  <p>
    <input type="submit" name="送出" id="送出" value="送出" />
  </p>
  
</form>

<?php
require("login.php");
$guestaccount=$_POST['guestaccount'];
$guestpassword=$_POST['guestpassword'];
if(isset($guestaccount)){
	mysql_query("INSERT INTO `project`.`login` (`account`, `password`) VALUES ('$guestaccount', '$guestpassword');");
}
?>

</body>
</html>