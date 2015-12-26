<?php
	session_start();
	//echo "Session started";
	if(isset($_SESSION["LoggedUserName"]) && isset($_SESSION["LoggedUserType"]))
	{
		// echo "User logged in is ".$_SESSION["LoggedUser"];
		// echo "User Type is ".$_SESSION["LoggedUserType"];
		// //header('Location: ./Admin/AdminHomePage.php');
		// echo "Redirecting to specified home page";
		// //die("");
		$userIsLoggedIn = true;
	}
	else
	{
		//Continue Logging Process..
		//Show login page..
		// //No user is currently logged in...
		// echo "No user is currently logged in...";
		// echo "Redirecting to login page";
		// header('Location : ./index.php');
		//die("");
		$userIsLoggedIn = false;
	}
?>