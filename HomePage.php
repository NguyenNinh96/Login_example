<?php
	include "connect.php";
	$u=$_COOKIE['username'];
	echo "Welcome ".$u;
?>
<!DOCTYPE html>
<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<link href="frame.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
		  
		 <script type="text/javascript">
		$(function() {

		$(".comment_button").click(function() 
		{
		var element = $(this);
		   
			var boxval = $("#content").val();
			
			var dataString = 'content='+ boxval;
			
			if(boxval=='')
			{
			alert("Xin nhập trạng thái");
			}
			else
			{
			$("#flash").show();
			$("#flash").fadeIn(400);
		$.ajax({
			type: "POST",
			url: "update.php",
			data: dataString,
		  cache: false,
		  success: function(html){
		 
		  $("ol#update").prepend(html);
		  $("ol#update li:first").slideDown("slow");
		   document.getElementById('content').value='';
		  $("#flash").hide();
			
		  }
		 });
		}
		return false;
			});
		});

		</script>
		<style type="text/css">
		</style>
	</head>
	<body>
		<div>
		</div>
		<div align="right" >
			
				<form method="post" action="list.php" >
					<button type="submit">Danh sách người dùng</button>
					</form>
				
		</div>
		<div align="center">
			<table cellpadding="0" cellspacing="0" width="500px">
				<td>
					<div align="left">
						<form  method="post" name="form" action="">
							<table cellpadding="0" cellspacing="0" width="500px">
								<tr><td align="left"><div align="left"><h3>Cập nhật trạng thái</h3></div></td></tr>
								<tr>
									<td style="padding:4px; padding-left:10px;" class="comment_box">
									<textarea cols="30" rows="2" style="width:480px;font-size:14px; font-weight:bold" name="content" id="content" maxlength="145" ></textarea><br />
									<input type="submit"  value="Đăng"  id="v" name="submit" class="comment_button"/>
									
									</td>
								</tr>
							</table>
						</form>
					</div>
					<div style="height:7px"></div>
					<div id="flash" align="left"  ></div>
					<ol  id="update" class="timeline">
						<?php
							$sql_in= mysql_query("SELECT * FROM status order by id desc");
								while($r = mysql_fetch_array($sql_in)){
								
								echo $r['username']." đã đăng: ".$r["status"]."<br>";
								}
						?>
					</ol>
					<div id="old_updates"></div>
					
				</td>
			</table>
		</div>
	</body>
</html>