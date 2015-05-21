
<?php $Title = "Online Quiz"; include_once "../Common/header.php"; ?>

<form class ="quiz">
	<fieldset class="quiz">
		<style>
			table {
			margin: 0 auto;
			}
			td{
			    margin:30px;
				vertical-align: top;
				float:initial;
			 }
			 
			.quiz{
			       background-color:#f1f1f1;
			       // border: 1px solid #c333;
			       border-radius:2px;
			       margin-bottom:12px;
			       // margin-left:px;
			        overflow:hidden;
			        padding:10px;
			      /* height:200px; */
			       width:100%;
			        align:centre;
			}
		</style>
<table style="float:left" border="0">
	<tr>
	<td>
	<table border="0">
	
		<tr> <td> <iframe src="../Admin/timer.php" width="285" height="190"> </iframe></td></tr>
		<tr> <td><iframe src="../Admin/grid.php" width="165" height="180"></iframe></td>  </tr>
        <tr> <td> </td></tr><tr> 
		<td> </td></tr><tr> 
		<td> </td></tr>
	</table>
	</td>
    
		
        <td><iframe src="QuestionDisplaypage.php" width="575" height="635"></iframe></td>
	</tr>
 </table>
 </fieldset>
 </form>
 
 
<?php include_once "../Common/footer.php"; ?>

