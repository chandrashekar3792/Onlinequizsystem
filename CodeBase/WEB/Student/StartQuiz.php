
<?php $Title = "Online Quiz"; include_once "../Common/header.php"; ?>
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
<form class="start">
	<fieldset>
<table class="table1"style="float:left" border="0">
	<tr>
	<td>
	<table border="0">
	
		<tr> <td class="td1"> <iframe src="../Admin/timer.php" width="285" height="190"frameborder="0"> </iframe></td></tr>
		<tr> <td><iframe src="../Admin/grid.php" width="165" height="180" frameborder="0"></iframe></td>  </tr>
        <tr> <td> </td></tr><tr> 
		<td> </td></tr><tr> 
		<td> </td></tr>
	</table>
	</td>
    
		
        <td><iframe src="QuestionDisplaypage.php" width="575" height="635"frameborder="0" ></iframe></td>
	</tr>
 </table>
 </fieldset>
 </form>
 
<?php include_once "../Common/footer.php"; ?>

