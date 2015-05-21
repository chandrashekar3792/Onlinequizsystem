<?php $Title = "Guidelines"; include_once "../Common/header.php" ?>

 <form class="guid">
 <fieldset>
 <p>You can test your Technical skills with Quiz.</p>
<hr><h2>The Test</h2>
<p>The test contains 16 questions and there is no time
limit.&nbsp;</p>
<p>The test is not official, it's just a nice way to see how much you know,
or
don't know, about Technical skills.</p>
<h2>Count Your Score</h2>
<p>You will get 1 point for
each correct answer. At the end of the Quiz, your total score will be displayed.
Maximum score is 16 points.</p>
<ul> 
	
	<button type="button" <button onclick="openWin()" >Start the Quiz</a>  </button>
	
	<script>
		function openWin() {
			//alert("Offset Width"+document.body.offsetWidth+ " h: "+document.body.offsetHeight );
			var myWindow = window.open("StartQuiz.php", "myWindow", "width="+640, "height="+480);
			setTimeout(function(){ myWindow.close() }, 1500000);
		}
		
	</script>
	
	


</ul>
</a> 
</fieldset>
</form>

<?php include_once "../Common/footer.php"; ?>