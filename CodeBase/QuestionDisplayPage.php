<?php $Title = "Online Quiz"; include_once "/Common/header.php"; ?>

<!-- insert the required html code here..
<!--Need to see if this really works.Including script tag within body.. -->
<script type="text/javascript" src="../js/queLoad.js" ></script>
<script type="text/javascript">
	transformQueXml("<Questions><question><QText>This is where the question text is placed1.</QText><op1>Op11</op1><op2>Op21</op2><op3>Op31</op3><op4>Op41</op4></question></Questions>");
	//transformQueXml("<Questions><question><QText>This is where the question text is placed1.</QText>	<op1>Op11</op1>	<op2>Op21</op2>	<op3>Op31</op3>		<op4>Op41</op4>	</question>		<question>		<QText>This is where the question text is placed2.</QText>		<op1>Op12</op1>		<op2>Op22</op2>	<op3>Op32</op3>	<op4>Op42</op4></question>	<question>	<QText>This is where the question text is placed3.</QText>		<op1>Op13</op1>	<op2>Op23</op2>	<op3>Op33</op3>	<op4>Op43</op4></question>	<question>	<QText>This is where the question text is placed4.</QText>	<op1>Op14</op1>	<op2>Op24</op2>	<op3>Op34</op3>	<op4>Op44</op4></question></Questions>");
	//sendQueRequest("B:\\Phani_M_Tech_Files\\M_Tech_2nd_Sem\\SE\\assignment\\quiz\\xml\\questions.xml");
	
</script>


<!-- Here you need to add the timer clock and the div space for questions -->
<div id="DivQuestion">

	<!--form id="FormQuestion" action="" method="">
		<label>Question 
			<span id="queNo"--> <!-- Space for adding question No.. --><!--/span>
		</label>
		<input type="radio" value="1" name="QueOptions" /><label>value 1</label>
		<input type="radio" value="1" name="QueOptions" /><label>value 1</label>
		<input type="radio" value="1" name="QueOptions" /><label>value 1</label>
		<input type="radio" value="1" name="QueOptions" /><label>value 1</label>
		
	</form-->
</div>
<?php include_once "/Common/footer.php"; ?>