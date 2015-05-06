<?php $Title = "Sign Up"; include_once "/Common/header.php" ?>

<form method="post" action=".php">
	<fieldset>
		<h2 class="signup">Sign Up</h2> 
		<p>
			<label for="first_name">First name:  </label>
			<input type="text" name="first_name" id="first_name"  size=”30” maxlength=”25” required
			placeholder="sri" autofocus=autofocus"/>
		</p>

		<p>
			<label for="last_name">Last namen: </label>
			<input type="text" name="last_name" id="last_name"  size=”30” maxlength=”25” required
			placeholder="pani"/>
		</p>
		
		<p>
			<label for="email">
			E-mail address:
			</label>
			<input type="email" name="email" id="email" size=”30”  maxlength=”25” required
			placeholder="jane.doe@example.com" multiple />
		</p>
		
		<p>
			<label for="telephone">Telephone number: </label>
			<input type="tel" name="telephone" id="telephone"  size=”30” maxlength=”25” required
				  placeholder="(000) 000-0000"/>
		</p>

		<p>
			<label for="Password">Password: </label>
			<input type="password" name="Password" id="Password"  size=”30” maxlength=”25” required
			placeholder="c@!dgj1123"/>
		</p>


		<p>
			<label for="Password"> Re-Enter Password: </label>
			<input type="password" name="Password" id="Password"  size=”30” maxlength=”25” required
			placeholder="c@!dgj1123"/>
		</p>
		
		<p> 
			<button type="submit" class="create_profile"> Create Account</button>
		</p>

	</fieldset>
</form>


<?php include_once "/Common/footer.php"; ?>

