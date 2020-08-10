<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php");
	$name=$_POST['Name'];
	$id = $_POST['Account'];
	$pw = $_POST['Password'];
	$pw2 = $_POST['Password2'];	
	$identity = $_POST['identity'];	
	date_default_timezone_set ("ASIA/Taipei");
	$mesTime=date("Y:m:d H:i:s");
	$getMemNo = "SELECT MAX(MemNo)
			  FROM member";
	$last = mysql_query($getMemNo);
	$new = @mysql_fetch_row($last);
	$newNo=$new[0]+1;
	$photo="NoImage.jpg";
	
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
	if($name !=null && $id != null && $pw != null && $pw2 != null &&  $pw == $pw2 )		
	{
        //新增資料進資料庫語法		
        $sql = "insert into `member`  values ('$id', '$pw','','$name','','','','','','$mesTime','$photo');";
		$sql2="insert into `student`  values ('$id','','');";
		$sql3="insert into `teacher`  values ('$id','','');";		
		if($identity == "learning"){
			mysql_query($sql2);
			mysql_query("insert into `learning`  values ('$id');");
		}
		else if($identity == "graduate"){
			mysql_query($sql2);
			mysql_query("insert into `graduate`  values ('$id','');");
		}
		else if($identity == "teacher"){
			mysql_query($sql3);			
		}
		
        if(mysql_query($sql))
        {
                echo '新增成功!<br>';
				echo '您的會員編號是'.$newNo.'號';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage2.php>';	
				mysql_query("update member 
							set MemNo='$newNo'
							where Account='$id'");
        }
        else
        {				
                echo '新增失敗!<br>';				
				echo '(此帳號已被註冊!)';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
        }
	}
	else
	{
		if($name==null || $id==null){
			echo '帳號或名字不可空白!!';
		}
		else{
			echo '確認密碼失敗!';
		}
        echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
	}
?>