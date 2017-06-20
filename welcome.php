<?php
	if(isset($_POST["username"])){
	 $u=$_POST['username'];
	 $p=$_POST['password']; 
	 }
	else{
		$u = $_COOKIE["username"]; 
		$p = $_COOKIE["password"]; 
	}
	$con=mysql_connect("localhost","root","") or die ("no connect");
	mysql_select_db("vidu_1");
	mysql_query("set names 'utf8'");
	$sql = "select * from input where Username='$u' and Password='$p'";
	$query = mysql_query($sql);
	$check=false;
	
	if(mysql_fetch_array($query) != NULL){
		$check=true;
		
	}
	if($check == true){
		echo "Welcome, ".$u;
		setcookie("username",$u,time()+(3*86400));
		setcookie("password",$p,time()+(3*86400));
		
		
	}
	else
		echo "User not found!!";
	mysql_close($con);
	
?>