
<?php $Title = "Online Quiz"; 
include_once "../checkUserSession.php";
include_once "../Common/header.php"; ?>
<style>
	table {
	margin: 0 auto;
	}
	td{
		margin:30px;
		vertical-align: top;
		float:initial;
	 }
</style>
<script type="text/javascript" src="../js/grid.js"></script>
<script type="text/javascript" src="../js/queLoad.js" ></script>
<form class="start">
	<fieldset>
		<table class="table1" style="float:left" border="1px">
			<!--tr>
			<td>
			<table border="1px"-->
				<tr>
					<td rowspan="2">
					<br /><br /><br /><br /><br /><br /><iframe id="questFrame" src="QuestionDisplaypage.php" width="500px" height="400px" frameborder="0" ></iframe>
					</td>
					 <td class="td1"> <iframe src="./MyTimer.php" width="210px" height="210px"frameborder="0"> </iframe><br />Current System Time<br />Insert Timer here<br /> Timer</td>
				</tr>
				<tr> 
					<!--td>2rc1</td-->
					<td><pre>    </pre><iframe id="gridFrame" src="./grid.php" width="165px" height="180px" frameborder="0"></iframe><br /> Questions Grid</td>
				</tr>
			<!--/table>
			</td>
			<tr>
				<td><iframe src="QuestionDisplaypage.php" width="640px" height="400px"frameborder="0" ></iframe></td>
			</tr-->
		 </table>
	</fieldset>
 </form>
 
<?php include_once "../Common/footer.php"; ?>

