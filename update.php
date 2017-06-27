<?php
	$u=$_COOKIE['username'];
	include "connect.php";
	if(isset($_POST['content']))
	{
		$content=$_POST['content'];
		mysql_query("INSERT INTO `status` (`id`, `status`,`username`) VALUES (NULL, '$content','$u')");
	}
	$sql_in= mysql_query("SELECT * FROM status order by id desc");
	$r = mysql_fetch_array($sql_in);
	//	echo $r["username"]." vừa cập nhập suy nghĩ: ".$r["status"]."<br>";
	
mysql_close();
?>

<div align="left">
<?php echo $r["username"]." vừa cập nhập suy nghĩ: ".$r["status"]."<br>"; ?>
</div>
