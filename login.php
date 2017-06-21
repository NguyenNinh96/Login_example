<!DOCTYPE html>
<html>
	<body>
		<form  method="post">
			Đăng nhập: <input type="submit" name="connect" value="login"><br>
			Đăng ký: <input type="submit" name="connect2" value="sign-up">
		</form>
		<?php
		
			if(isset($_POST["connect"])){
				if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])) {
				header('Location: input.php');exit;
			} else {
				header('Location:welcome.php');exit;
			}
			}
			if(isset($_POST["connect2"])){
				header('Location:sign_up.php');exit;
			}
		?>
		 
	</body>
</html>

