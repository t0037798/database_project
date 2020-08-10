
<html> 

<HEAD> 
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5"> 
</HEAD> 

<SCRIPT type='text/javascript'> 

function go() 
{ url = document.f1.s1.options[document.f1.s1.selectedIndex].value 
document.getElementById("if1").src = url 
} 

</SCRIPT> 

<body> 

<br><br> 

<form name="f1"> 
選擇 
<select name="s1" style="width:200px;" onChange="go()"> 
<option value="http://tw.yahoo.com">台灣雅虎 
<option value="http://hk.yahoo.com">香港雅虎 
<option value="http://map.google.com">Google Map 
<option value="http://你的網頁4">甚麼4 
<option value="http://你的網頁5">甚麼5 
<option value="http://你的網頁6">甚麼6 
</select> 
</form> 

<br><br> 

<hr style="width:100%; height:2px;"> 

<iframe id="if1" src="http://tw.yahoo.com" style="width:100%; height:1500px;" scrolling="no" frameborder="no"> 
</iframe> 
</body> 
</html> 