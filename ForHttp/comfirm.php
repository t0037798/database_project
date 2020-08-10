<?php
mysql_connect("localhost","root","7434961z");
mysql_select_db("project");
mysql_query("set names utf8");
?>

<?php
$num=$_POST{'num'};
$data =mysql_query("SELECT * FROM rent WHERE id = $num");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="homepage.css" />
<title>器材租借</title>
</head>

<body class="body">
 <?php $rs=mysql_fetch_row($data); 
 if(isset($rs[0])){ ?>
    <p>確定要刪除這筆資料嗎?</p>
    <form action="returnresault.php" method="post">
    <center><table width="1000" border="1">
      <tr>
        <td width="80"><center>編號</center></td>
        <td width="80"><center>姓名</center></td>
        <td width="80"><center>電話</center></td>
        <td width="80"><center>借用器材</center></td>
        <td width="80"><center>借用數量</center></td>
        <td width="80"><center>借用理由</center></td>
        <td width="120"><center>借用時間</center></td>
        </tr>
          <tr>
            <td><center><?php echo $rs[0]?></center></td>
            <td><center><?php echo $rs[1]?></center></td>
            <td><center><?php echo $rs[2]?></center></td>
            <td><center><?php echo $rs[3]?></center></td>
            <td><center><?php echo $rs[4]?></center></td>
            <td><center><?php echo $rs[5]?></center></td>
            <td><center><?php echo $rs[6]?></center></td>
          </tr>
      </table></center>
<p>歸還編號:<input name="num" value="<?php echo $num ?>" readonly="readonly" /></p>
<p><input name="gogo" type="submit" value="確定"/>  <input name="回上一頁" type="button" id="回上一頁" value="取消" onclick="location.href='return.php'"></p>
</form>
<?php
}
else{
?>
<p>查無此資料</p>
<input name="回上一頁" type="button" id="回上一頁" value="回上一頁" onclick="location.href='return.php'">
<?php
}
?>
</body>
</html>