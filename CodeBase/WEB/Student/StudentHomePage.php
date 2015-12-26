<?php

	include_once "../checkUserSession.php";
	if(!$userIsLoggedIn)
	{
		//Redirect to login page..
		echo "User is not logged in...";
		header('Location: ../index.php');
		exit;
	}
else if($_SESSION["LoggedUserType"] == "S")
{
	//header('Location: ../Student/StudentHomePage.php');
	//exit;
	//continue showing this page...
}
else if($_SESSION["LoggedUserType"] == "A")
{
	header('Location: ./AdminHomePage.php');
	exit;
}
	$Title = "Welcome Student"; 
	include_once "../Common/header.php";
	include_once "./guidelines.php";
	include_once "../Common/footer.php";
?>
