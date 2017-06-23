<?php 
	if(isset($_POST['username'])){
		$u=$_POST['username'];
		$p=$_POST['password'];
		$con=mysql_connect("localhost","root","") or die ("no connect");
		mysql_select_db("vidu_1");
		mysql_query("set names 'utf8'");
		$query = mysql_query("SELECT * from input where Username = '".$u."'");
		$result = mysql_num_rows($query);
		
		if ($result > 0){
			echo "trung";
		}
		else{
			echo "thanhcong";
			mysql_query("INSERT INTO `input` ( `Username`, `Password`) VALUES ( '$u','$p');");
		}
		mysql_close($con);
	}
?>