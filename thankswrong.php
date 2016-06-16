<?php
	session_start();
	
	$player = $_SESSION['$playerName'];
	echo "Thanks for your time ".$player;
?>