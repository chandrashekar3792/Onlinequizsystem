<?php 
	
	include_once "../checkUserSession.php";
	if(!$userIsLoggedIn)
	{
		//Redirect to login page..
		header('Location: ../index.php');
		exit;
	}

	$Title = "Delete User";
	include_once "../Common/header.php" 
?>  
<form class="col-md-12" method="GET" action="" onsubmit="sendUserSearchReq(); return false">
<fieldset>

<p>
<label for="username">Search User </label>
<input id="username"type="search" name="search" autofocus/>
</p>

<p> 
<input type="Submit"  value="Delete" ></input>
</p>
<div id="divSearchMsg" style="color:red;">

</div>



</fieldset>
</form>
<script type="text/javascript" src="../js/sendUserSearchReq.js"></script>
<?php include_once "../Common/footer.php"; ?>