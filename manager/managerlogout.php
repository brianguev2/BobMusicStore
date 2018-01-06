<?php
	session_start();
        unset($_SESSION['user_name']);
        session_destroy();
	header("Location: managerloginpage.php");
	//also added logout to header so user can logout of website
?>