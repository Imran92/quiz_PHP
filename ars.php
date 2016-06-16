<?php

	$errormsg="";
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$qstn=$_POST['question'];
		$ans1=$_POST['a1'];
		$ans2=$_POST['a2'];
		$ans3=$_POST['a3'];
		$ans4=$_POST['a4'];
		$correct=$_POST['correctAns'];
		
		$qstn=htmlspecialchars($qstn);
		$ans1=htmlspecialchars($ans1);
		$ans2=htmlspecialchars($ans2);
		$ans3=htmlspecialchars($ans3);
		$ans4=htmlspecialchars($ans4);
		
		$userName="root";
		$pass="";
		$database="arrow";
		$server="127.0.0.1";
		
		$db_handle=mysql_connect($server,$userName,$pass);
		$db_found=mysql_select_db($database,$db_handle);
		
		if($db_found)
		{
			$sql="select * from questions";
			
			$rslt = mysql_query($sql);
			$numRows= mysql_num_rows($rslt);
			
			$boolLastRow = mysql_data_seek($rslt,($numRows - 1));
			
			$row = mysql_fetch_row($rslt);
			$qID = $row[0];
			
			$nextn = ltrim($qID,'q');
			$nextn++;
			$qstno='q'.$nextn;
			
			$sql = "insert into questions (qID  , Question, ansA, ansB , ansC, ansD, corAns) values ('$qstno', '$qstn', '$ans1', '$ans2', '$ans3', '$ans4', '$correct')";
			$rslt = mysql_query($sql);
			
			print "The qstn has been added to the database";
			
		}
		else
		{
			print "Database NOT found";
			mysql_close($db_handle);
		}
		
		
	}

?>

<html>
<head>
<h1>Set the Question Here</h1>
</head>
<body>

	<FORM NAME="frst" METHOD="POST" ACTION="ars.php">
	
	Enter The Question: <INPUT TYPE='TEXT' NAME= 'question' VALUE= "What is the question? ">
	<p>
		Answer A:<INPUT Type='TEXT' NAME='a1' value="" maxlength="40"><br><br>
		Answer B:<INPUT Type='TEXT' NAME='a2' value="" maxlength="40"><br><br>
		Answer C:<INPUT Type='TEXT' NAME='a3' value="" maxlength="40"><br><br>
		Answer D:<INPUT Type='TEXT' NAME='a4' value="" maxlength="40"><br><br>
		Put the Name of the Correct answer (a/b/c/d):<INPUT Type='TEXT' NAME='correctAns' value="" maxlength="40"><br><br>
	</p>
	<p align = center>
	<INPUT type= "Submit" Name= "submit1" VALUE = "Set this question">
	</p>
	
	</FORM>
	
	<p>
	
	
</body>

</html>