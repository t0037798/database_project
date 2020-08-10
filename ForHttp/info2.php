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
	$sql2 = "SELECT * FROM `militaryservice` where Account = '$Account'";
	$sql3 = "SELECT * FROM `institute` where Account = '$Account'";
	$sql4 = "SELECT * FROM `employment` where Account = '$Account'";
	$result = mysql_query($sql);
	$result2 = mysql_query($sql2);
	$result3 = mysql_query($sql3);
	$result4 = mysql_query($sql4);
	$row = @mysql_fetch_row($result);	
	$row2 = @mysql_fetch_row($result2);
	$row3 = @mysql_fetch_row($result3);
	$row4 = @mysql_fetch_row($result4);
}
?>

<!DOCTYPE html>               <!--留言完成介面-->
<html>
	<head>
		<title>Result</title>
	</head>
	<CENTER>
	<body>
	<?php
		//date_default_timezone_set ("ASIA/Taipei");		
		$Name=$_POST["Name"];
		$Sex=$_POST["Sex"];
		$FB=$_POST["FB"];
		$Line=$_POST["Line"];
		$Email=$_POST["Email"];
		$Phone=$_POST["Phone"];
		$StdID=$_POST["StdID"];	
		$DeptLevel=$_POST["DeptLevel"];	
		$Office=$_POST["Office"];	
		$Lab=$_POST["Lab"];	
		$Serve=$_POST["Serve"];
		$Institute=$_POST["Institute"];
		$Inst=$_POST["Inst"];
		$InstDept=$_POST["InstDept"];
		$Degree=$_POST["Degree"];
		$employment=$_POST["employment"];
		$Company=$_POST["Company"];
		$CompDept=$_POST["CompDept"];
		$Position=$_POST["Position"];
		
		
		if(!empty($Name)){
			mysql_query("update `member`
							set `Name`='$Name'
							where `Account`='$Account'");			
		}
		if(!empty($Sex)){
			mysql_query("update `member`
							set `Sex`='$Sex'
							where `Account`='$Account'");			
		}
		if(!empty($FB)){
			mysql_query("update `member`
							set `FB`='$FB'
							where `Account`='$Account'");			
		}
		if(!empty($Line)){
			mysql_query("update `member`
							set `Line`='$Line'
							where `Account`='$Account'");			
		}
		if(!empty($Email)){
			mysql_query("update `member`
							set `Email`='$Email'
							where `Account`='$Account'");			
		}
		if(!empty($Phone)){
			mysql_query("update `member`
							set `Phone`='$Phone'
							where `Account`='$Account'");			
		}
		if(!empty($Office)){
			mysql_query("update `teacher`
							set `Office`='$Office'
							where `Account`='$Account'");			
		}
		if(!empty($Lab)){
			mysql_query("update `teacher`
							set `Lab`='$Lab'
							where `Account`='$Account'");			
		}
		if(!empty($StdID)){
			mysql_query("update `student`
							set `StdID`='$StdID'
							where `Account`='$Account'");			
		}
		if(!empty($DeptLevel)){
			mysql_query("update `student`
							set `DeptLevel`='$DeptLevel'
							where `Account`='$Account'");			
		}
		if(!empty($Serve)){
			if($Serve!="不公開"){				
				if($row2[0] == null){								
					mysql_query("insert into `militaryservice`
								values ('$Account','$Serve')");		
				}
				else{					
					mysql_query("update `militaryservice`
								set `Condition`='$Serve'
								where `Account`='$Account'");	
				}
			}
			else{				
				mysql_query("delete from `militaryservice`							
							where `Account`='$Account'");			
			}
		}
		if(!empty($Institute)){
			if($Institute=="公開"){				
				if($row3[0] == null){
					mysql_query("insert into `Institute`
								values ('$Account','','','')");											
				}
				if(!empty($Inst)){
						mysql_query("update `Institute`
							set `InstName`='$Inst'
							where `Account`='$Account'");			
				}
				if(!empty($InstDept)){
					mysql_query("update `Institute`
						set `DeptName`='$InstDept'
						where `Account`='$Account'");			
				}
				
				mysql_query("update `Institute`
					set `Degree`='$Degree'
					where `Account`='$Account'");		
							
			}
			else{				
				mysql_query("delete from `Institute`							
							where `Account`='$Account'");			
			}
		}
		if(!empty($employment)){
			if($employment=="公開"){				
				if($row4[0] == null){								
					mysql_query("insert into `employment`
								values ('$Account','','','')");		
				}
				if(!empty($Company)){
					mysql_query("update `employment`
								set `Company`='$Company'
								where `Account`='$Account'");											
				}
				if(!empty($CompDept)){
						mysql_query("update `employment`
							set `Department`='$CompDept'
							where `Account`='$Account'");			
				}
				if(!empty($Position)){
					mysql_query("update `employment`
						set `Position`='$Position'
						where `Account`='$Account'");			
				}
			}
			else{				
				mysql_query("delete from `employment`							
							where `Account`='$Account'");			
			}
		}
		header("Location: showinfo.php");      //跳轉至個人資料
		exit;
?>
</body>
</html>