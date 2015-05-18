var textFields = new Array();
var totalTxtBoxes = 0;
var moveTB = false;
var selectedTBox = null;
var isImageUploaded = false;
// window.onload = function()
// {
	// alert("onload fun called");
	// var imgDispContainer = document.getElementById("UploadedImage");
	// var Container = document.getElementById("HtmlElemDisplayContainer");
	// Container.style.top = imgDispContainer.x+"px";
	// Container.style.left = imgDispContainer.y+"px";
	// Container.x = imgDispContainer.x;
	// Container.y = imgDispContainer.y;
// }
function resetAddNewFormUI()
{
	//alert("Resetting the add new form page");
	
	totalTxtBoxes = 0;
	while(textFields.length > 0)
	{
		document.body.removeChild(textFields.pop());
	}
	document.getElementById("PosX").value = "";
	document.getElementById("PosY").value = "";
	document.getElementById("tName").value = "";
	document.getElementById("form_title").value = "";
	
	alert("Form Added Successfully..");
	window.location = "../Admin/AdminHomePage.php";
}

function deleteSelectedTBox()
{
	if(selectedTBox != null)
	{
		//Remove first from the body..
		document.body.removeChild(selectedTBox);
			
		//Then remove from the TBox array...
		textFields.pop(textFields.indexOf(selectedTBox));
		
	}//If any text box is selected, on then delete..
}

function addNewTextBox()
{
	//alert("Adding text box");
	//var uploadedImgElem = document.getElementById("UploadedImage");
	//var Container = document.getElementById("HtmlElemDisplayContainer");
	
	// var xPos = (parseInt(document.getElementById("PosX").value) + parseInt(Container.style.left)) + "px";
	// var yPos = (parseInt(document.getElementById("PosY").value) + parseInt(Container.style.top)) + "px";

	// var xPos = (parseInt(document.getElementById("PosX").value) + Container.x) + "px";
	// var yPos = (parseInt(document.getElementById("PosY").value) + Container.y) + "px";

	//alert("add new tb");
	 var xPos = document.getElementById("PosX").value + "px";
	 var yPos = document.getElementById("PosY").value + "px";
	 var tName = document.getElementById("tName").value;


	if(xPos.length>2 && yPos.length>2)
	{
		var txtInputElem = document.createElement("input");
		txtInputElem.type = "text";

		txtInputElem.style.width = "100px";
		txtInputElem.style.height = "25px";
		txtInputElem.style.position = "absolute";
		txtInputElem.onmouseover = tbSelect;
		//txtInputElem.onmousemove = tbManipulate;
		//txtInputElem.onkeypress = tbManipulate;
		txtInputElem.onkeydown = tbManipulate;
		txtInputElem.onmouseout = tbDeSelect;
		//txtInputElem.disabled = true;
		//txtInputElem.class = "applnTextbox";
		
		document.body.appendChild(txtInputElem);
		txtInputElem.style.top = xPos;
		txtInputElem.style.left = yPos;
		
		textFields.push(txtInputElem);
		totalTxtBoxes++;
		txtInputElem.name = tName+"_"+totalTxtBoxes;
	}//end of if valid position details entered..
}//end of function addNewTextBox..

// function setTBPos(tBoxElem,posX,posY)
// {
	// if(posX.length>2 && posY.length>2)
	// {
		// //var txtInputElem = document.createElement("input");
		// // tBoxElem.type = "text";
		// // tBoxElem.style.width = "100px";
		// // tBoxElem.style.height = "25px";
		// tBoxElem.style.position = "absolute";
		// //txtInputElem.class = "applnTextbox";
		
		// //Container.appendChild(tBoxElem);
		// tBoxElem.style.top = posX;
		// tBoxElem.style.left = posY;

		// //textFields.push(txtInputElem);
	// }//end of if valid position details entered..
// }//end of setTBPos function...

function tbManipulate()
{
	//alert("On click fun called");
	//if(event == KeyboardEvent)
	{
		if(moveTB)
		{
			//console.log("moving..");
			var moveByPxAmount = 3;
			var moveDiffX, moveDiffY;
			if(event.keyCode == 46)//If Key pressed is "Delete" button...
			{
				deleteSelectedTBox();
				return;
			}
			else if(event.keyIdentifier == "Down")
			{
				moveDiffX = 1*moveByPxAmount ;
				moveDiffY = 0;
				//move right by 1 px at a time..
			}
			else if(event.keyIdentifier == "Right" )
			{
				moveDiffX = 0;
				moveDiffY = 1*moveByPxAmount ;
				//move left by 1 px at a time...
			}
			else if(event.keyIdentifier == "Up")
			{
				moveDiffX = -1*moveByPxAmount ;
				moveDiffY = 0;
				//move right by 1 px at a time..
			}
			else if(event.keyIdentifier == "Left" )
			{
				moveDiffX = 0;
				moveDiffY = -1*moveByPxAmount ;
				//move left by 1 px at a time...
			}
			//console.log("Event is");
			 this.style.top = ((parseInt(this.style.top)) + moveDiffX) + "px";
			 this.style.left = ((parseInt(this.style.left)) + moveDiffY) + "px";
			 
			document.getElementById("PosX").value = this.style.top;
			document.getElementById("PosY").value = this.style.left;

		}//end of if move...
	}//end of if KeyboardEvent..
}//end of function...

function tbDeSelect()
{
	//console.log("Deselected..");
	this.value = ""
	moveTB = false;
	selectedTBox = null;
}

function tbSelect()
{
	//console.log("selected..");
	document.getElementById("PosX").value = this.style.top;
	document.getElementById("PosY").value = this.style.left;
	document.getElementById("tName").value = this.name;
	this.value = "selected";
	moveTB = true;
	selectedTBox = this;
}


function SaveNewForm()
{
	//alert("Creating GET req");
	if(! isImageUploaded)
	{
		alert("First Upload the image");
		return;
	}
	if(totalTxtBoxes <= 0)
	{
		var cont = confirm("No Text Boxes are added. Continue??");
		if(cont == false)
			return;
	}
	formSavePostReq = createFormSavePostReq();

	sendFormSaveReq();
	
}

function encodeNameAndValue(sName, sValue) 
{ 
	var sParam = encodeURIComponent(sName); 
	sParam += "="; 
	sParam += encodeURIComponent(sValue); 
	return sParam; 
}

function createFormSavePostReq()
{

	var paramsArray = new Array();
	
	//adding form title to request.
	paramsArray.push(encodeNameAndValue(document.getElementById("form_title").name,document.getElementById("form_title").value));
	paramsArray.push(encodeNameAndValue("filePath",document.getElementById("fileInput").value));
	
	//alert(document.getElementById("fileInput").value);
	//Adding all text boxes info to get request.
	for(i=0;i<textFields.length;i++)
	{
		paramsArray.push(encodeNameAndValue(textFields[i].name,"["+parseInt(textFields[i].style.left)+","+parseInt(textFields[i].style.top)+"]"));
	}
	
	return paramsArray.join("&");
	
}

function sendFormSaveReq()
{
	var divElem = document.getElementById("divFormSaveMsg");
	divElem.innerHTML = "";
	//var xhrReq = zXmlHttp.createRequest();
	//frmSavePostReq = createFormSaveGetReq();
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
					var divElem = document.getElementById("divFormSaveMsg");
					divElem.style.color = "red";
					divElem.innerHTML = "Failed To Save the form..";
					return;
					//divElem.innerHTML = xhrReq.responseText;
				}//end of if form save failure..
				else
				{

					var divElem = document.getElementById("divFormSaveMsg");
					divElem.style.color = "green";
					//divElem.innerHTML = "Save form successful..";
					divElem.innerHTML = xhrReq.responseText;
					resetAddNewFormUI();
					
					
				}//end of form save success..
			}//end of if XHR status == 200
		}//ebd if uf readtState == 4
	}//end of onreadystatechange() anonymous function...
	
	xhrReq.open("POST","SaveFormBackend.php", true);
	//xhrReq.open("POST","SaveFormBackend.php", true);
	xhrReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//xhrReq.setRequestHeader("Content-Type", "multipart/form-data");
	
	//enctype="multipart/form-data";
	//alert(formSavePostReq+" is the post req");
	xhrReq.send(formSavePostReq);
	//alert("Sent XHR request");
}//end of function sendReq..

function displayRes(result)
{
	var divElem = document.getElementById("divFormSaveMsg");
	isImageUploaded = result;
	if(!result)
	{
		divElem.style.color = "red";
		divElem.innerHTML = "Image Upload Failed. Try changing file name and Upload again.";
	}
	else
	{
		divElem.style.color = "green";	
		divElem.innerHTML = "Image Uploaded Successfully";
		elem=document.getElementById("uploadImageBtn").disabled="disabled";
		document.getElementById("fileInput").disabled = "disabled";
	}
	
}