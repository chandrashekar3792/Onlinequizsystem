function encodeNameAndValue(sName, sValue) 
{ 
	var sParam = encodeURIComponent(sName); 
	sParam += "="; 
	sParam += encodeURIComponent(sValue); 
	return sParam; 
}

function createUserSearchPOSTReq()
{
	var paramsArray = new Array();
	var usernameElem = document.getElementById("username");
	// var passElem = document.getElementById("password");
	// var adminRadioElem = document.getElementById("admin");
   	// var EvalRadioElem = document.getElementById("eval");
	// var RCDRadioElem = document.getElementById("rcd");
	// var RadioValue;
	// if(adminRadioElem.checked)
		// RadioValue = "A";
	// else if(EvalRadioElem.checked)
		//RadioValue = "E";
	// else if(RCDRadioElem.checked)
		// RadioValue = "R";
	// else
		// RadioValue = "";
	
	paramsArray.push(encodeNameAndValue("search",usernameElem.value));
	// paramsArray.push(encodeNameAndValue(passElem.name,passElem.value));
	// paramsArray.push(encodeNameAndValue("autho",RadioValue));
	
	//return paramsArray.join("&");
	
}

function sendUserSearchReq()
{	alert("sending request");
	var divElem = document.getElementById("divSearchMsg");
	divElem.innerHTML = "";
	//alert("Sending Login XHR REQ");
	//var xhrReq = zXmlHttp.createRequest();
	UserSearchPostReq = createUserSearchPOSTReq();
	var xhrReq = new XMLHttpRequest();
	xhrReq.async = true;
	xhrReq.onreadystatechange = function()
	{
		if(xhrReq.readyState == 4)
		{
			//alert("Received XHR response ");
			//alert(xhrReq.status);
			if(xhrReq.status == 200)
			{
				//alert("Correct response received");
				//transformQueXml(xhrReq.responseText);
				alert(xhrReq.responseText);
				if(xhrReq.responseText.indexOf("Failure")>=0)
				{
					//alert("Not found");
					var divElem = document.getElementById("divSearchMsg");
					divElem.innerHTML = "Username not found";
					//divElem.innerHTML = xhrReq.responseText;
				}//end of if login failure..
				else
				{
					// var divElem = document.getElementById("divLoginMsg");
					// divElem.innerHTML = "Login Successful";
					
					//Set Logged In Cookie..
					//setCookie("LogInUser",loginPostReq);
					var divElem = document.getElementById("divSearchMsg");
					divElem.innerHTML = "Username found";
					//alert("found");
					//redirect to AdminLoginPage.php
					//window.location=xhrReq.responseText;
					
				}//end of else login success..
			}//end of if XHR status == 200
		}//ebd if uf readtState == 4
	}//end of onreadystatechange() anonymous function...
	//alert(document.getElementById("username").value);
	xhrReq.open("get","SearchByUser.php?search="+document.getElementById("username").value,true);
	
	//alert ("request sending");
	//xhrReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhrReq.send();
	//alert("Sent XHR request");
}//end of function sendReq..

