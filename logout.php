<?php

	session_start();
	unset($_SESSION["username"]);
	unset($_SESSSION["email"]);
	header("Location: index.php");

?>
