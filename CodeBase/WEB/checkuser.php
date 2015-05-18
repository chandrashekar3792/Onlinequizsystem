
<?php
include_once "../common/dbconnect.php";
//echo "Failure";
$user_name=$_GET["username"]; //echo $user_name;
$tbl_name="USERS";
$sql="SELECT * FROM $tbl_name WHERE name='$user_name'";
//echo $sql;

$result=mysql_query($sql);
echo $count=mysql_num_rows($result);
if($count==0)
{
	 echo "success";
}
else
{
	echo "failure";
}

?>
 