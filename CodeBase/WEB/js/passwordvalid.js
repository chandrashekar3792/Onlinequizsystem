function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('Password');
    var pass2 = document.getElementById('Password1');
	var message = document.getElementById('confirmMessage');
    //Store the Confimation Message Object ...
   // var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value && pass1.value != document.getElementById("CurrPassword").value){
		
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        //pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
		document.getElementById("my_submit").disabled = false;
    }
	else
	{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        //pass2.style.backgroundColor = badColor;
		
        message.style.color = badColor;
        message.innerHTML = "New Password should not be same as old Password and New and Confirm Passwords Do Not Match!";
		document.getElementById("mySubmit").disabled = true;
    }
}

function verifyCurrPass()
{
	var xhrObj = new XMLHttpRequest();
	xhrObj.onreadystatechange = function()
	{
		if(xhrObj.readyState == 4)
		{
			if(xhrObj.status == 200)
			{
				if(xhrObj.responseText.indexOf("Fail")>=0)
				{
					var divElem = document.getElementById("currPassMsg");
					divElem.style.color = "red";
					divElem.innerHTML = "Enter correct password";
					//Disable other text fields with modify button..
					document.getElementById("Password1").disabled = true;
					document.getElementById("Password").disabled = true;
					document.getElementById("my_submit").disabled = true;
				}
				else if(xhrObj.responseText.indexOf("Success")>=0)
				{
					var divElem = document.getElementById("currPassMsg");
					divElem.style.color = "green";
					divElem.innerHTML = "";
					document.getElementById("Password1").disabled = false;
					document.getElementById("Password").disabled = false;
					document.getElementById("my_submit").disabled = true;					
					//Enable other text fields with modify button...
				}
				//alert(xhrObj.responseText);
				//alert("xhrObj.responseText == Fail :" + xhrObj.responseText.indexOf("Fail"));
			}
		}
	}
	myReq = encodeNameAndValue("CurrPassword",document.getElementById("CurrPassword").value);
	xhrObj.open("POST","verifyUserPassBackend.php",true);
	xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhrObj.send(myReq);
}

function encodeNameAndValue(sName, sValue) 
{ 
	var sParam = encodeURIComponent(sName); 
	sParam += "="; 
	sParam += encodeURIComponent(sValue); 
	return sParam; 
}


function ModifyAccount()
{
	var ModPostReq = createModifyPostReq();
	
	var divElem = document.getElementById("divModifyMsg");
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
				if(xhrReq.responseText.indexOf("Success") >= 0)
				{
					var divElem = document.getElementById("divModifyMsg");
					divElem.style.color = "green";
					divElem.innerHTML = "Your Profile is Updated successfully";
					alert("Your Profile is Updated successfully");
					window.location = "../index.php";					
					return;
					//divElem.innerHTML = xhrReq.responseText;
				}//end of if form save failure..
				else
				{
					var divElem = document.getElementById("divModifyMsg");
					divElem.style.color = "red";
					//divElem.innerHTML = "Save form successful..";
					divElem.innerHTML = xhrReq.responseText;
				}//end of form save success..
			}//end of if XHR status == 200
		}//ebd if uf readtState == 4
	}//end of onreadystatechange() anonymous function...
	
	xhrReq.open("POST","EditMyProfileBackend.php", true);
	//xhrReq.open("POST","SaveFormBackend.php", true);
	xhrReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//xhrReq.setRequestHeader("Content-Type", "multipart/form-data");
	
	//enctype="multipart/form-data";
	//alert(formSavePostReq+" is the post req");
	xhrReq.send(ModPostReq);
	//alert("Sent XHR request");
}

function createModifyPostReq()
{
	var paramsArray = new Array();

	usernameElem = document.getElementById("email");
	paramsArray.push((encodeNameAndValue(usernameElem.name,usernameElem.value)));

	usernameElem = document.getElementById("telephone");
	paramsArray.push((encodeNameAndValue(usernameElem.name,usernameElem.value)));

	usernameElem = document.getElementById("Password");
	paramsArray.push((encodeNameAndValue(usernameElem.name,usernameElem.value)));
	
	return paramsArray.join("&");
}