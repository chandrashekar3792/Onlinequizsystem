<?php $Title = "Sign In"; include_once "/Common/header.php" ?>

<form method="post" action=".php">
	<fieldset>
		<h2 class="signup">Sign In</h2> 

		<p>
			<label for="email">
			E-mail address:
			</label>
			<input type="email" name="email" id="email" size=”30” maxlength=”25”  required
			placeholder="jane.doe@example.com" multiple autofocus="autofocus" />
		</p>


		<p>
			<label for="Password">Password: </label>
			<input type="password" name="Password" id="Password" size=”30” maxlength=”25” required
			placeholder="c@!dgj1123"/>
		</p>


		<p> 
			<button type="submit" class="enter_profile">Log In</button>
		</p>

	</fieldset>
</form>

<?php include_once "/Common/footer.php"; ?>