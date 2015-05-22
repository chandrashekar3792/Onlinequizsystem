<?php
header("Content-Type: text/plain");
include '../common/dbconnect.php';

$i = 1;

$myQueString = "<Questions>";
//while($i<25)
while($i<24)
{
$result=mysql_query("select * from que_list where que_id='$i'");
$count=mysql_num_rows($result);

$myQueString = $myQueString."<question>";
$colCnt = mysql_num_fields($result);
$j = 0;
$val = mysql_fetch_array($result,MYSQL_BOTH);
while($j < $colCnt)
{
	//print_r($val);
	if($j != 1)
	{
		if($j == 0)
		{
			$myQueString = $myQueString."<QId>";
			$myQueString = $myQueString."$val[2]";
			$myQueString = $myQueString."</QId>";			
		}
		if($j == 2)
		{
			$myQueString = $myQueString."<QText>";
			$myQueString = $myQueString."$val[2]";
			$myQueString = $myQueString."</QText>";
		}
if($j == 3)
		{
			$myQueString = $myQueString."<op1>";
			$myQueString = $myQueString."$val[3]";
			$myQueString = $myQueString."</op1>";
		}
if($j == 4)
		{
			$myQueString = $myQueString."<op2>";
			$myQueString = $myQueString."$val[4]";
			$myQueString = $myQueString."</op2>";
		}
if($j == 5)
		{
			$myQueString = $myQueString."<op3>";
			$myQueString = $myQueString."$val[5]";
			$myQueString = $myQueString."</op3>";
		}
if($j == 6)
		{
			$myQueString = $myQueString."<op4>";
			$myQueString = $myQueString."$val[6]";
			$myQueString = $myQueString."</op4>";
		}	
if($j == 7)
		{
			$myQueString = $myQueString."<ans>";
			$myQueString = $myQueString."$val[7]";
			$myQueString = $myQueString."</ans>";
		}			
	}
	$j++;
}//end of inner while
$myQueString = $myQueString."</question>";
$i++;
}//end of outer while..
$myQueString = $myQueString."</Questions>";

echo $myQueString;

//include_once "../Common/footer.php";
include '../common/dbDisconnect.php';
//echo "<Questions><question><QText>This is where the question text is placed1.</QText><op1>Op11</op1><op2>Op21</op2><op3>Op31</op3><op4>Op41</op4></question></Questions>";
// echo
// "<Questions>
	// <question>
		// <QText>This is where the question text is placed1.</QText>
		// <op1>Op11</op1>
		// <op2>Op21</op2>
		// <op3>Op31</op3>
		// <op4>Op41</op4>
	// </question>
// </Questions>"
?>
