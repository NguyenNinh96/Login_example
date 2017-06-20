<?php
	if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])) {
		include('input.php');exit;
	} else {
		include('welcome.php');exit;
	}
?>


