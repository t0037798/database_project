<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php");
	$AncTitle=$_POST['AncTitle'];
	$AncContent = $_POST['AncContent'];	
	date_default_timezone_set ("ASIA/Taipei");
	$mesTime=date("Y:m:d H:i:s");
	
//判斷公告各項是否為空值
	if($AncTitle !=null && $AncContent != null)		
	{
        //新增資料進資料庫語法		
        $sql = "insert into `announcement`  values ('','$AncTitle','$AncContent','$mesTime');";	
		
        if(mysql_query($sql))
        {
                echo '新增成功!<br>';
        }
        else
        {				
                echo '新增失敗!<br>';
					echo $AncTitle;
					echo $AncContent;
        }
	}
	else
	{
		echo '標題或內容不可空白!!';
	}
	echo '<meta http-equiv=REFRESH CONTENT=1;url=publish.php?Page=1>';
?>