<?php
function checkLoginExpired() {
	$login_duration = 10; //time in second
	$current_time = time();
	if (isset($_SESSION['login_time']) and isset($_SESSION["did"])) {
		if((time() - $_SESSION['login_time']) > $login_duration ){
			return true;
		}
	}
	return false;
}
?>