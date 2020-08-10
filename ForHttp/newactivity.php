<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php");
	$ActTitle=$_POST['ActTitle'];
	$ActContent = $_POST['ActContent'];
	$ActLocation = $_POST['ActLocation'];
	//$myfile = $_POST['myfile'];
	date_default_timezone_set ("ASIA/Taipei");
	$mesTime=date("Y:m:d H:i:s");
	
//判斷公告各項是否為空值
	if($ActTitle !=null && $ActContent != null)		
	{
		
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
				$id = $ActTitle;
				$dot ='.'.pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);//取得檔案附檔名
				$SaveDocName = $id.$dot;
				move_uploaded_file($_FILES["myfile"]["tmp_name"],'activitypicture/'.iconv('utf-8','big5',$SaveDocName));
				
				$sql = "insert into `activity`  values ('','$ActTitle','$ActContent','$ActLocation','$mesTime' ,'$SaveDocName');";
			}
			else///無圖片
			{
				$sql = "insert into `activity`  values ('','$ActTitle','$ActContent','$ActLocation','$mesTime' ,'NoImage.png');";
			}
		}
		else
		{
			echo '圖片錯誤';
			echo '<meta http-equiv=REFRESH CONTENT=1;url=activity.php?Page=1>';
		}
		
        //新增資料進資料庫語法

		
        if(mysql_query($sql))
        {				
                echo '新增成功!<br>';
				echo '<meta http-equiv=REFRESH CONTENT=1;url=activity.php?Page=1>';
        }
        else
        {				
                echo '新增失敗!<br>';
					echo $ActTitle;
					echo $ActContent;
					echo $ActLocation;
					echo $SaveDocName;
        }
	}
	else
	{
		echo '標題或內容不可空白!!';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=activity.php?Page=1>';
	}

?>