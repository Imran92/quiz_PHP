<?php
	session_start();
	
	$score=0;
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$nm=$_POST['name'];
		$ml=$_POST['mail'];
		$_SESSION['$playerName']=$nm;
		$_SESSION['$playerMail']=$ml;
		
	
		$_SESSION['$score']=0;
	

		$_SESSION['$num']=0;;
		
		echo "clicked";
		$_SESSION['$num']=0;
		Header("Location: Qstn1.php");
	}
?>

<html>
<body>
<FORM NAME="ajaira" METHOD="POST" ACTION="starquizpre.php">
	Enter your Email address: <INPUT TYPE='TEXT' NAME='mail' Value=''>
	Enter your Name: <INPUT TYPE='TEXT' NAME='name' Value=''>
	<INPUT TYPE='SUBMIT' Name='sub' Value='Dont care'>
</FORM>
</body>
</html>