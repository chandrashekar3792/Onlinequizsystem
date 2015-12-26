<?php
include_once "./checkUserSession.php";
header("Content-Type: text/plain");
if(!isset($_POST["username"]) or !isset($_POST["password"]) or !isset($_POST["autho"]))
{
	die("Failure");
}

$login_name=$_POST["username"];
$login_password=$_POST["password"];

if ($_POST['autho'] == "A")
{
	$autho="A";
}
else if ($_POST['autho'] == "S")
{
	$autho="S";
}

include_once "./common/dbconnect.php";
$tbl_name="USERS"; 
$sql="SELECT name FROM $tbl_name WHERE name='$login_name' and password='$login_password' and usertype='$autho'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
	//set login session variables here.. since login is successful..
	session_unset();//remove all existing variables in session..
	//echo"User logged in successfully and session variables are set..";
	$_SESSION["LoggedUserName"] = $login_name;
	$_SESSION["LoggedUserType"] = $autho;
	if($autho == "A")
	{
		//echo "Admin login successfull";
		echo "./Admin/AdminHomePage.php";
		//header('Location: ./Admin/AdminHomePage.php');
	}
	else if($autho == "S")
	{
		//echo "Record-Keeper login successful from authenticate user.php";
		echo "./Student/StudentHomePage.php";
	}
}
else 
{
	echo "Failure";
}

?>