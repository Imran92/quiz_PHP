<?PHP

$user_name = "root";
$password = "";
$database = "arrow";
$server = "127.0.0.1";


if($_SERVER['REQUEST_METHOD']=='POST')
{
$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

$user= $_POST['adm'];
$pass=$_POST['pas'];

$sql = "select * from admin where name = '$user' and password = '$pass'";
$result= mysql_query($sql);

$numRows= mysql_num_rows($result);

if($numRows==0)
	Header("Location: adminScore.php");
else
{
	echo "Welcome Admin<br>";

$SQL = "SELECT * FROM player";
$result = mysql_query($SQL);

while ( $db_field = mysql_fetch_assoc($result) ) {

print $db_field['name'] . "     ";
print $db_field['mailId'] . "    ";
print $db_field['score'] . "<BR>";

}
}

mysql_close($db_handle);

}
else {

print "Database NOT Found ";
mysql_close($db_handle);

}
}

?>