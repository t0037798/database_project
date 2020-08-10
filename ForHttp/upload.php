<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$PictureFile = $_POST['PictureFile'];
$a=$_FILES["PictureFile"]["name"];
if($_FILES['PictureFile']['error']>0){
  echo "Error: " . $_FILES["file"]["error"]; 
}
else{
　　echo $a; 
}

move_uploaded_file($_FILES['PictureFile']['tmp_name'],'memberpicture/'.$_FILES['PictureFile']['name']);//複製檔案(檔案位置,新位置)
echo '<a href="memberpicture/'.$_FILES['PictureFile']['name'].'">memberpicture/'.$_FILES['PictureFile']['name'].'</a>';//顯示檔案路徑
?>