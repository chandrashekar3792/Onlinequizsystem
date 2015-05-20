<form>
<table>
  <tr>
	  <td  onclick="myFunction(this, 'red')">1</td>
	  <td  onclick="myFunction(this,'blue')">2</td>
	  <td  onclick="myFunction(this,'red')">3</td>
	  <td  onclick="myFunction(this,'blue')">4</td>
	  <td  onclick="myFunction(this,'blue')">5</td>
  
  </tr>
	<tr>
		<td  onclick="myFunction(this,'blue')">6</td>
		<td  onclick="myFunction(this,'blue')">7</td>
		<td  onclick="myFunction(this,'blue')">8</td>
		<td  onclick="myFunction(this,'blue')">9</td>
		<td  onclick="myFunction(this,'blue')">10</td>
		
	</tr>
	<tr>
		<td  onclick="myFunction(this,'blue')">11</td>
		<td  onclick="myFunction(this,'blue')">12</td>
		<td  onclick="myFunction(this,'blue')">13</td>
		<td  onclick="myFunction(this,'blue')">14</td>
		<td  onclick="myFunction(this,'blue')">15</td>
		
	</tr>
	<tr>
		<td  onclick="myFunction(this,'blue')">16</td>
		<td  onclick="myFunction(this,'blue')">17</td>
		<td  onclick="myFunction(this,'blue')">18</td>
		<td  onclick="myFunction(this,'blue')">19</td>
		<td  onclick="myFunction(this,'blue')">20</td>
		
	</tr>
	<tr>
		<td  onclick="myFunction(this,'blue')">21</td>
		<td  onclick="myFunction(this,'blue')">22</td>
		<td  onclick="myFunction(this,'blue')">23</td>
		<td  onclick="myFunction(this,'blue')">24</td>
		<td  onclick="myFunction(this,'blue')">25</td>
		
	</tr>
  </table>
  <style>
  table{
	  border-style: solid;
	  border-color: #98bf21;
       }
	  td{
		  border-style: solid;
	      border-color: red;
	  
        }
		tr{
	  border-style: solid;
	  border-color: blue;
		}
	   </style>
<script>
	function myFunction(elmnt,clr) {
		elmnt.style.color = clr;
	}
</script>
  </form>