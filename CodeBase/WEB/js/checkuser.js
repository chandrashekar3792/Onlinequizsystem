function encodeNameAndValue(sName, sValue) 
{ 
	var sParam = encodeURIComponent(sName); 
	sParam += "="; 
	sParam += encodeURIComponent(sValue); 
	return sParam; 
}

function checkuser()
{
	
	var usernameElem = document.getElementById("username");
	var username=(encodeNameAndValue(usernameElem.name,usernameElem.value));
		
	return username;
	
}

function sendusercheckReq()
{	
	var divElem = document.getElementById("divLoginMsg");
	divElem.innerHTML = "";
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
				if(xhrReq.responseText.indexOf("failure")>0)
				{
					var divElem = document.getElementById("divLoginMsg");
					divElem.style.color = "red";
					divElem.innerHTML = "Username Name already exist";
					document.getElementById("mySubmit").disabled = true;
					//divElem.innerHTML = xhrReq.responseText;
				}//end of if login failure..
				else
				{
					var divElem = document.getElementById("divLoginMsg");
					divElem.style.color = "green";
					divElem.innerHTML = " Username Name available";
					document.getElementById("mySubmit").disabled = false;
					
				}//end of else user entry success..
			}//end of if XHR status == 200
		}//ebd if uf readtState == 4
	}//end of onreadystatechange() anonymous function...
	
	xhrReq.open("get","checkuser.php?username="+document.getElementById("username").value, true);
	//xhrReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhrReq.send();
	//alert("Sent XHR request");
}//end of function sendReq..

function createUserPostReq()
{

	var paramsArray = new Array();
	var usernameElem = document.getElementById("username");
	paramsArray.push((encodeNameAndValue(usernameElem.name,usernameElem.value)));

	usernameElem = document.getElementById("email");
	paramsArray.push((encodeNameAndValue(usernameElem.name,usernameElem.value)));

	usernameElem = document.getElementById("telephone");
	paramsArray.push((encodeNameAndValue(usernameElem.name,usernameElem.value)));

	usernameElem = document.getElementById("Password");
	paramsArray.push((encodeNameAndValue(usernameElem.name,usernameElem.value)));
	
	var adminElem = document.getElementById("admin");
	var evalElem = document.getElementById("eval");

	if(adminElem.checked)
		paramsArray.push((encodeNameAndValue("autho","A")));
	if(evalElem.checked)
	{
		paramsArray.push((encodeNameAndValue("autho","S")));
	}

	return paramsArray.join("&");
	
}

function sendUserCreateReq()
{
	userCreatePostReq = createUserPostReq();
	var divElem = document.getElementById("divUserSaveMsg");
	divElem.innerHTML = "";
	var xhrReq = new XMLHttpRequest();
	xhrReq.async = true;
	xhrReq.onreadystatechange = function()
	{
		if(xhrReq.readyState == 4)
		{
			if(xhrReq.status == 200)
			{
				//alert("Correct response received");
				if(xhrReq.responseText == "Success")
				{
					var divElem = document.getElementById("divUserSaveMsg");
					divElem.style.color = "green";
					divElem.innerHTML = "User registered successfully";
					alert("User Registered/Added successfully");
					window.location = "../Admin/AdminHomePage.php";
					return;
					//divElem.innerHTML = xhrReq.responseText;
				}//end of if form save failure..
				else
				{

					var divElem = document.getElementById("divUserSaveMsg");
					divElem.style.color = "red";
					//divElem.innerHTML = "Save form successful..";
					divElem.innerHTML = xhrReq.responseText;
					
					
					
				}//end of form save success..
			}//end of if XHR status == 200
		}//ebd if uf readtState == 4
	}//end of onreadystatechange() anonymous function...
	
	xhrReq.open("POST","ValidateNewUser.php", true);
	//xhrReq.open("POST","SaveFormBackend.php", true);
	xhrReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//xhrReq.setRequestHeader("Content-Type", "multipart/form-data");
	
	//enctype="multipart/form-data";
	//alert(formSavePostReq+" is the post req");
	xhrReq.send(userCreatePostReq);
	//alert("Sent XHR request");
}//end of function sendReq..