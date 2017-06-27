<?php 
mysql_connect("localhost","root","") or die ("no connect");
mysql_select_db("quanly");
mysql_query("set names 'utf8'");
$sql = "select * from nguoidung";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	echo $row["STT"]." - ".$row["username"]."<br>";
}
mysql_close();
?>