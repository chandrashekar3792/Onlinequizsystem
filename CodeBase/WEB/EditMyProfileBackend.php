<?php
extract($_POST);
include_once "./checkUserSession.php";
include_once "./common/dbconnect.php";
$name = $_SESSION["LoggedUserName"];
$query = "update USERS set password='$Password',phone='$telephone',email='$email' where name='$name'";
//echo $query;
$data = mysql_query ($query);
if($data)
{
	echo "Success";
}
else
{
	echo "Failure";
}
	
include_once "./common/dbDisconnect.php";

?>