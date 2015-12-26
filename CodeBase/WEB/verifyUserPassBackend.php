<?php
//header("Content-Type: text/plain");
include_once "./checkUserSession.php";
$pass=$_POST["CurrPassword"]; //echo $user_name;
$user = $_SESSION["LoggedUserName"];
include_once "./common/dbconnect.php";
$sql="SELECT * FROM users WHERE name='$user' and password='$pass'";
//echo $sql;
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==0)
{
	 echo "Fail";
}
else
{
	echo "Success";
}
include_once "./common/dbDisconnect.php";
?>
 