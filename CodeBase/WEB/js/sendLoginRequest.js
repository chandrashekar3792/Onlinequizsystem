function encodeNameAndValue(sName, sValue) 
{ 
	var sParam = encodeURIComponent(sName); 
	sParam += "="; 
	sParam += encodeURIComponent(sValue); 
	return sParam; 
}

function createLoginPOSTReq()
{
	var paramsArray = new Array();
	var usernameElem = document.getElementById("username");
	var passElem = document.getElementById("password");
	var adminRadioElem = document.getElementById("admin");
	var stuRadioElem = document.getElementById("student");
	var RadioValue;
	if(adminRadioElem.checked)
		RadioValue = "A";
	else if(stuRadioElem.checked)
		RadioValue = "S";
	else
		RadioValue = "";
	
	paramsArray.push(encodeNameAndValue(usernameElem.name,usernameElem.value));
	paramsArray.push(encodeNameAndValue(passElem.name,passElem.value));
	paramsArray.push(encodeNameAndValue("autho",RadioValue));
	
	return paramsArray.join("&");
	
}

function sendLoginReq()
{
	var divElem = document.getElementById("divLoginMsg");
	divElem.innerHTML = "";
	//alert("Sending Login XHR REQ");
	//var xhrReq = zXmlHttp.createRequest();
	loginPostReq = createLoginPOSTReq();
	var xhrReq = new XMLHttpRequest();
	xhrReq.async = true;
	xhrReq.onreadystatechange = function()
	{
		if(xhrReq.readyState == 4)
		{
			//alert("Received XHR response ");
			if(xhrReq.status == 200)
			{
				//alert("Correct response received");
				//transformQueXml(xhrReq.responseText);
				if(xhrReq.responseText == "Failure")
				{
					var divElem = document.getElementById("divLoginMsg");
					divElem.innerHTML = "Username or Password Incorrect";
					//divElem.innerHTML = xhrReq.responseText;
				}//end of if login failure..
				else
				{
					// var divElem = document.getElementById("divLoginMsg");
					// divElem.innerHTML = "Login Successful";
					
					//Set Logged In Cookie..
					//setCookie("LogInUser",loginPostReq);
					
					//redirect to AdminLoginPage.php
					window.location=xhrReq.responseText;
					
				}//end of else login success..
			}//end of if XHR status == 200
		}//ebd if uf readtState == 4
	}//end of onreadystatechange() anonymous function...
	
	xhrReq.open("post","AuthenticateUser.php", true);
	xhrReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhrReq.send(loginPostReq);
	//alert("Sent XHR request");
}//end of function sendReq..