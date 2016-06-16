<?php
	session_start();
	
	$firstScore= $_SESSION['$score'];
	$score=$_SESSION['$score'];
	
	
	echo "$score";
	
	$firstnum= $_SESSION['$num'];
	$num= $_SESSION['$num'];
	
	$playerName=$_SESSION['$playerName'];
	$playerMail=$_SESSION['$playerMail'];
	
	$_SESSION['$playerName']=$playerName;
	$_SESSION['$playerMail']=$playerMail;
	
	
	$qID = '';
	$question1 = 'Question not set';
	$ans1a = 'unchecked';
	$ans1b = 'unchecked';
	$ans1c = 'unchecked';
	$ans1d = 'unchecked';
	$cor1='';
	
	$qID = '';
	$question1 = 'Question not set';
	$ans2a = 'unchecked';
	$ans2b = 'unchecked';
	$ans2c = 'unchecked';
	$ans2d = 'unchecked';
	$cor2='';
	
	$qID = '';
	$question3 = 'Question not set';
	$ans3a = 'unchecked';
	$ans3b = 'unchecked';
	$ans3c = 'unchecked';
	$ans3d = 'unchecked';
	$cor3='';
	
	$qID = '';
	$question4 = 'Question not set';
	$ans4a = 'unchecked';
	$ans4b = 'unchecked';
	$ans4c = 'unchecked';
	$ans4d = 'unchecked';
	$cor4='';
	
	$qID = '';
	$question5 = 'Question not set';
	$ans5a = 'unchecked';
	$ans5b = 'unchecked';
	$ans5c = 'unchecked';
	$ans5d = 'unchecked';
	$cor5='';

	$user_name = "root";
	$password = "";
	$database = "arrow";
	$server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	
	if ($db_found) {
		$num++;
		$n1=$num;
		$qnum='q'.$num;
		$SQL="SELECT * FROM questions WHERE questions.qID = '$qnum'";
		$result = mysql_query($SQL);

		$db_field = mysql_fetch_assoc($result);

			$qID = $db_field['qID'];
			$question1 = $db_field['Question'];
			$ans1a = $db_field['ansA'];
			$ans1b = $db_field['ansB'];
			$ans1c = $db_field['ansC'];
			$ans1d = $db_field['ansD'];
			$cor1 = $db_field['corAns'];
		
		$num++;
		$n2=$num;
		$qnum='q'.$num;
		$SQL="SELECT * FROM questions WHERE questions.qID = '$qnum'";
		$result = mysql_query($SQL);

		$db_field = mysql_fetch_assoc($result);

			$qID = $db_field['qID'];
			$question2 = $db_field['Question'];
			$ans2a = $db_field['ansA'];
			$ans2b = $db_field['ansB'];
			$ans2c = $db_field['ansC'];
			$ans2d = $db_field['ansD'];
			$cor2 = $db_field['corAns'];
		
		$num++;
		$n3=$num;		
		$qnum='q'.$num;
		$SQL="SELECT * FROM questions WHERE questions.qID = '$qnum'";
		$result = mysql_query($SQL);

		$db_field = mysql_fetch_assoc($result);

			$qID = $db_field['qID'];
			$question3 = $db_field['Question'];
			$ans3a = $db_field['ansA'];
			$ans3b = $db_field['ansB'];
			$ans3c = $db_field['ansC'];
			$ans3d = $db_field['ansD'];
			$cor3 = $db_field['corAns'];
		
		$num++;
		$n4=$num;
		$qnum='q'.$num;
		$SQL="SELECT * FROM questions WHERE questions.qID = '$qnum'";
		$result = mysql_query($SQL);

		$db_field = mysql_fetch_assoc($result);

			$qID = $db_field['qID'];
			$question4 = $db_field['Question'];
			$ans4a = $db_field['ansA'];
			$ans4b = $db_field['ansB'];
			$ans4c = $db_field['ansC'];
			$ans4d = $db_field['ansD'];
			$cor4 = $db_field['corAns'];
		
		$num++;
		$n5=$num;		
		$qnum='q'.$num;
		$SQL="SELECT * FROM questions WHERE questions.qID = '$qnum'";
		$result = mysql_query($SQL);

		$db_field = mysql_fetch_assoc($result);

			$qID = $db_field['qID'];
			$question5 = $db_field['Question'];
			$ans5a = $db_field['ansA'];
			$ans5b = $db_field['ansB'];
			$ans5c = $db_field['ansC'];
			$ans5d = $db_field['ansD'];
			$cor5 = $db_field['corAns'];

			mysql_close($db_handle);

	}
	else {
		print "Error getting Survey";
		mysql_close($db_handle);
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(isset($_POST['a1']) && isset($_POST['a2']) && isset($_POST['a3']) && isset($_POST['a4']) && isset($_POST['a5']))
		{
			if($cor1==$_POST['a1'])
				$score++;
			if($cor2==$_POST['a2'])
				$score++;
			if($cor3=$_POST['a3'])
				$score++;
			if($cor4==$_POST['a4'])
				$score++;
			if($cor5==$_POST['a5'])
				$score++;
			
			if($score-$firstScore>=3)
			{
				$_SESSION['$num'] = $num;
				$_SESSION['$score'] = $score;
				if($num<10)
					Header("Location: Qstn1.php");
				else
					Header("Location: thanksforplaying.php");
			}
			else
			{
				Header("Location: thankswrong.php");
			}
		}
		
		else
		
		{
			$_SESSION['$num'] = $firstnum;
			$_SESSION['$score']=$firstScore;
			Header("Location: Qstn1.php");
		}
	
	}
	
	
?>

<html>

<head>
	<h1>Answer All of the questions Below</h1>
</head>

<body>
	<FORM NAME="qstn" METHOD="POST" ACTION="Qstn1.php">
	<br><br>Question<?php echo "$n1"?>: <?php echo "$question1"?><br><br>
	Answer A:<INPUT Type='RADIO' NAME='a1' value="a"><?php echo "$ans1a"?><br><br>
    Answer B:<INPUT Type='RADIO' NAME='a1' value="b" ><?php echo "$ans1b"?><br><br>
	Answer C:<INPUT Type='RADIO' NAME='a1' value="c" ><?php echo "$ans1c"?><br><br>
	Answer D:<INPUT Type='RADIO' NAME='a1' value="d" ><?php echo "$ans1d"?><br><br>
	<br><br>
	Question<?php echo "$n2"?>: <?php echo "$question2"?><br><br>
	Answer A:<INPUT Type='RADIO' NAME='a2' value="a"><?php echo "$ans2a"?><br><br>
	Answer B:<INPUT Type='RADIO' NAME='a2' value="b"><?php echo "$ans2b"?><br><br>
	Answer C:<INPUT Type='RADIO' NAME='a2' value="c"><?php echo "$ans2c"?><br><br>
	Answer D:<INPUT Type='RADIO' NAME='a2' value="d"><?php echo "$ans2d"?><br><br>
	<br><br>
	Question<?php echo "$n3"?>: <?php echo "$question3"?><br><br>
	Answer A:<INPUT Type='RADIO' NAME='a3' value="a"><?php echo "$ans3a"?><br><br>
	Answer B:<INPUT Type='RADIO' NAME='a3' value="b"><?php echo "$ans3b"?><br><br>
	Answer C:<INPUT Type='RADIO' NAME='a3' value="c"><?php echo "$ans3c"?><br><br>
	Answer D:<INPUT Type='RADIO' NAME='a3' value="d"><?php echo "$ans3d"?><br><br>
	<br><br>
	Question<?php echo "$n4"?>: <?php echo "$question4"?><br><br>
	Answer A:<INPUT Type='RADIO' NAME='a4' value="a"><?php echo "$ans4a"?><br><br>
	Answer B:<INPUT Type='RADIO' NAME='a4' value="b"><?php echo "$ans4b"?><br><br>
	Answer C:<INPUT Type='RADIO' NAME='a4' value="c"><?php echo "$ans4c"?><br><br>
	Answer D:<INPUT Type='RADIO' NAME='a4' value="d"><?php echo "$ans4d"?><br><br>
	<br><br>
	Question<?php echo "$n5"?>: <?php echo "$question5"?><br><br>
	Answer A:<INPUT Type='RADIO' NAME='a5' value="a"><?php echo "$ans5a"?><br><br>
	Answer B:<INPUT Type='RADIO' NAME='a5' value="b"><?php echo "$ans5b"?><br><br>
	Answer C:<INPUT Type='RADIO' NAME='a5' value="c"><?php echo "$ans5c"?><br><br>
	Answer D:<INPUT Type='RADIO' NAME='a5' value="d"><?php echo "$ans5d"?><br><br>
	
	<INPUT Type='SUBMIT' NAME='sub' value="done"><br><br>
	
	</FORM>
</body>

</html>