<?php
	 $u=$_POST['username'];
	 $p=$_POST['password'];
	$con=mysql_connect("localhost","root","") or die ("no connect");
	mysql_select_db("vidu_1");
	mysql_query("set names 'utf8'");
	$sql = "select * from input";
	$query = mysql_query($sql);
	$check=false;
	while($row = mysql_fetch_array($query)){
		if( $row["Username"]==$u && $row["Password"]==$p)
			$check = true;
	}
	if($check == true)
		echo "Welcome, ".$u;
	else
		echo "User not found!!";
	mysql_close($con);			

?>
