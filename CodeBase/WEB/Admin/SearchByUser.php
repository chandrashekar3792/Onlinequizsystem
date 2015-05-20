<?php
include_once "../common/dbconnect.php";
print_r($_GET);
$user_name=$_GET["search"];
$tbl_name="USERS"; 

// $sql="SELECT * FROM USERS WHERE name like % $search";
$sql ="SELECT * FROM $tbl_name WHERE name ='$user_name'";
//echo $sql;
$result=mysql_query($sql);
// Mysql_num_row is counting table row
echo $count=mysql_num_rows($result);
if($count==0)
{
	echo "Failure";
	
}
else 
{
	// $sql="SELECT * FROM USERS WHERE name like % $search";
	$sql ="Delete FROM $tbl_name WHERE name ='$user_name'";
	//echo $sql;
	$result=mysql_query($sql);	
	echo "success";
}

?>

 