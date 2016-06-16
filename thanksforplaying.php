<?php
	session_start();
	
	$player = $_SESSION['$playerName'];
	$mail=$_SESSION['$playerMail'];
	$score=$_SESSION['$score'];
	
	echo "Thanks for playing till the end ".$player;
	echo "<br>score  :".$score;
	
	$user_name = "root";
	$password = "";
	$database = "arrow";
	$server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	
	if ($db_found) 
	{
		
		$SQL="insert into player(name , mailId, score) values ('$player', '$mail', $score)";
		$result = mysql_query($SQL);
		echo "<br>Saved In Database";
		mysql_close($db_handle);
	}
	
	else				
	{
			print "<br>Database NOT found";
			mysql_close($db_handle);
	}
?>