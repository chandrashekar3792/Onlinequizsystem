<?php 

function NewUser()
{ 
	$name = $_POST['username'];
	$phone = $_POST['telephone'];
	$email = $_POST['email']; 
	$password = $_POST['Password']; 
	$userType = $_POST['autho'];
	
	if(!isset($_POST["username"]) or !isset($_POST["password"]) or !isset($_POST["autho"]) or
		!isset($_POST["email"]) or !isset($_POST["telephone"]) 
		)
	{
		echo "Failure";
	}
	
	include_once "./common/dbconnect.php";
	$query = "INSERT INTO USERS (name,password,usertype,phone,email) VALUES ('$name','$password','$userType','$phone','$email')";
	
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
}
NewUser();

?>
