<?php
	 $u=$_POST['username'];
	 $p=$_POST['password']; 
	$r=$_POST['repw'];
	if($u==NULL || $p==NULL || $r==NULL){
		echo "Nhap khong hop le";
	} else if($p != $r){
		echo "Nhap sai";
	}else
	{
	$con=mysql_connect("localhost","root","") or die ("no connect");
	mysql_select_db("vidu_1");
	mysql_query("set names 'utf8'");
	$sql = "INSERT INTO `input` ( `Username`, `Password`) VALUES ( '$u','$p');";
	$query = mysql_query($sql);
	echo"dang ky thanh cong";
	mysql_close($con);
	}
?>