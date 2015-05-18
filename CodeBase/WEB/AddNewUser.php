<?php 
$Title = "Sign Up"; 
include_once "./Common/header.php" 
?>

<form method="post" action="" onsubmit="sendUserCreateReq(); return false">
	<fieldset>
		<h2 class="signup">ADD NEW USER</h2> 
		<p>
			<label for="first_name">Name:  </label>
			<input type="text" name="username" id="username"  size="30" maxlength="25" required
			placeholder="username" onchange="sendusercheckReq()" autofocus=autofocus"/>
		</p>
		<div id="divLoginMsg">
		</div>

		
		<p>
			<label for="first_name">User Type:  </label>
			<input id="admin" type="radio" name="autho" value="admin"  required>ADMINSTRATOR </input>
			<input id="eval"  type="radio" name="autho" value="eval"  required>Student</input>
			<!--input id="rcd"   type="radio" name="autho" value="record"  required>RECORD KEEPER</input-->
		</p>
		
		<p>
			<label for="email">
			E-mail address:
			</label>
			<input type="email" name="email" id="email" size="30"  maxlength="25"
			placeholder="jane.doe@example.com"  required />
		</p>
		<p>
			<label for="telephone">Telephone number: </label>
			<input type="tel" name="telephone" id="telephone"  size="30" maxlength="25"
				  placeholder="(000) 000-0000" required/>
		</p>

		<p>
			<label for="Password">Password: </label>
			<input type="password" name="Password" id="Password"  size="30" maxlength="25" required
			placeholder="c@!dgj1123" onblur="checkPass()"/>
		</p>


		<p>
			<label for="Password"> Re-Enter Password: </label>
			<input type="password" name="Password1" id="Password1"  size="30" maxlength="25" required
			placeholder="c@!dgj1123" onblur="checkPass()" />
			<div id="confirmMessage"></div>
		</p>
		
		
		
		<p> 
			<input type="submit" id="mySubmit" value="Create Account"> </input>
			<input type="reset" value="Reset"> </input>
		</p>
		<div id="divUserSaveMsg">
		</div>
	</fieldset>
</form>

<script type="text/javascript" src="./js/passwordvalid.js"></script>
<script type="text/javascript" src="./js/checkuser.js"></script>
<?php include_once "./Common/footer.php"; ?>

