<?php $Title = "Guidelines"; include_once "../Common/header.php" ?>
<form class="add">
<style>
	input[type="submit"]{
		   margin-left:100px;
		   margin-bottom:30px;
	}
</style>
<h2> Add New Questions  
	<input id="question"type="text" name="Question">  </h2>
    <p><input type="radio" name="question" value="choice1"> <input type="text" name="choice1"></P>
	<p><input type="radio" name="question" value="choice2"> <input type="text" name="choice2"></P>
	<p><input type="radio" name="question" value="choice3"> <input type="text" name="choice3"></p>
	<p><input type="radio" name="question" value="choice4"> <input type="text" name="choice4"></p>
	<input type="submit" value="Submit">
</form>
	<?php include_once "../Common/footer.php"; ?>