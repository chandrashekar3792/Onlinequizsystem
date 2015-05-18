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
	header('Location: ../Student/StudentHomePage.php');
	exit;
}
else if($_SESSION["LoggedUserType"] == "A")
{
	//header('Location: ./AdminHomePage.php');
	//exit;
	//continue showing this page...
}
	$Title = "Welcome Admin"; 
	include_once "../Common/header.php" 
?>
<form>
	<table >
		<tr>
			<td><a href="./Edituser.php" > <img src = "../images/logo2c.png" title = "Click Here To Edit An Existing User" alt = "Click Here To Edit An Existing User" style="width:300px; height:100px" /> </a></td>
			<td><a href="./DeleteUser.php" > <img src = "../images/DeleteUser.png" title = "Click Here Delete Existing User" alt = "Click Here Search An User" style="width:300px; height:100px" /> </a></td>
		</tr>
		<tr align="center">
			<td  colspan="2"><a href="./AddQuestions.php" > <img src = "../images/AddQuestions.png" title = "Click Here To Add New Questions" alt = "Click Here Search An User" style="width:300px; height:100px" /> </a></td>
		</tr>
	</table>
<form>
<?php include_once "../Common/footer.php"; ?>