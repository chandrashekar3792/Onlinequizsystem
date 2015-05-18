<?php 
	include_once "./checkUserSession.php";
	if(!$userIsLoggedIn)
	{
		//Redirect to login page..
		//header('Location: ../index.php');
		echo "User is not logged in..";
		print_r($_SESSION);
		exit;
	}
// else if($_SESSION["LoggedUserType"] == "S")
// {
	// header('Location: ../Student/StudentHomePage.php');
	// exit;
// }
// else if($_SESSION["LoggedUserType"] == "A")
// {
	// //header('Location: ./AdminHomePage.php');
	// //exit;
	// //continue showing this page...
// }
	//echo "Echoing fromedit mu profile";
	$Title = "Edit User"; 
	include_once "./Common/header.php" ;
	include_once "./Common/dbConnect.php";
	$sql = "select phone,email from users where name='$_SESSION[LoggedUserName]'";
	$res = mysql_query($sql);
	$array=mysql_fetch_array($res,MYSQL_BOTH);
	$phoneNo = $array[0];
	$email = $array[1];
	include_once "./Common/dbDisconnect.php";
?>
<form method="post" action="">
	<fieldset>
		<label style="width:150px; height:30px">Edit User: <?php echo $_SESSION["LoggedUserName"]?></label> 
		<p>
			<label for="first_name">User Type:  </label>
			<input type="radio" name="autho" checked="checked" value=<?php echo $_SESSION["LoggedUserType"]?>>
				<?php if($_SESSION["LoggedUserType"] == "A")
						{
						?>
						Admin
						<?php
						}//end of if..
						else if($_SESSION["LoggedUserType"] == "S")
						{
						?>
						STUDENT
						<?php
						}//end of else if..
				?>
			</input>
		</p>
		
		<p>
			<label for="email">
			E-mail address:
			</label>
			<input type="email" name="email" id="email" size="30"  maxlength="25" required
			placeholder="Enter Email Id" value="<?php echo $email?>" multiple />
		</p>
		
		<p>
			<label for="telephone">Telephone number: </label>
			<input type="tel" name="telephone" id="telephone"  size="30" maxlength="25" required
				  value="<?php echo $phoneNo?>" placeholder="Enter Phone No"/>
		</p>

		<p>
			<label for="Password">Current Password: </label>
			<input type="password" name="CurrPassword" id="CurrPassword"  size="30" maxlength="25" required
			placeholder="Enter Current Pass"/>
		</p>
		
        <p>
			<label for="Password">New Password: </label>
			<input type="password" name="Password" id="Password"  size="30" maxlength="25" required
			placeholder="Enter New Pass" onblur="checkPass()"/>
		</p>

		<p>
			<label for="Password"> Re-Enter Password: </label>
			<input type="password" name="Password1" id="Password1"  size="30" maxlength="25" required
			placeholder="Confirm New Pass" onblur="checkPass()" />
			<div id="confirmMessage"></div>
		</p>
		
		<p> 
			<button type="submit" class="create_profile"> Modify Account</button>
			<button type="reset" class="create_profile"> Cancel</button>
		</p>

	</fieldset>
</form>
<script type="text/javascript">
	document.getElementById("Password").disabled = true;
	document.getElementById("Password1").disabled = true;
</script>
<script type="text/javascript" src="../../js/passwordvalid.js"></script>

<?php include_once "./Common/footer.php"; ?>

