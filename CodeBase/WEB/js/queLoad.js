// function sendQueRequest(fileName)
// {
	// if(fileName)
	// {
		// sendReq(fileName);
		// //transformXml(xml);
	// }
// }//end of fn loadAndTransformXml..
quesArray = new Array();
markedAns = new Array();
dispQueNo = 1;
ansSubmitted = false;
function sendGetQueReq()
{
	//alert("Creating XHR REQ");
	//var xhrReq = zXmlHttp.createRequest();
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
				transformQueXmlToArray(xhrReq.responseText);
				dispQue(1);
			}
		}
	}//end of onreadystatechange() anonymous function...
	
	xhrReq.open("GET","getQuestionsBackend.php", true);
	xhrReq.send();
	//alert("Sent XHR request");
}//end of function sendReq..

function dispQue(queNo)
{
	if(queNo > 24 || queNo < 1)
		return;
	else
	{
		dispQueNo = queNo;
		transformQueXml(quesArray[queNo-1]);
	}
	parent.document.getElementById("questFrame").contentDocument.getElementById("QuestionNo").innerHTML = "Question No:" + dispQueNo;
}

function transformQueXmlToArray(xmlQueString)
{
	var domParser = new DOMParser();
	xmlDom = domParser.parseFromString(xmlQueString,"text/xml");

	quesArray = xmlDom.firstChild.children;
	for(itr = 0;itr<quesArray.length;itr++)
	{
		markedAns[itr] = "NA";	
	}
}

function transformQueXml(xmlDom)
{
	//alert("Transforming the received xml file");
	//var xmlDom = zXmlDom.createDocument();
	//var xmlDom =  document.implementation.createDocument("","",null);
	//var domParser = new DOMParser();
	//xmlDom = domParser.parseFromString(xmlQueString,"text/xml");
	//xmlDom.async = false;
	//xmlDom.loadXML(xmlQueString);
	
	//var xslDom = zXmlDom.createDocument();
	// var xslDom = document.implementation.createDocument("","",null);
	// xslDom.async = false;
	// xslDom.load("questions.xsl");
	
	var xslDom;
	var xhrReq = new XMLHttpRequest();
	//xhrReq.async = false;
	xhrReq.onreadystatechange = function()
	{
		if(xhrReq.readyState == 4)
		{
			//alert("Received response as 4 ");
			if(xhrReq.status == 200)
			{
				//xslDom = xhrReq.responseText;
				xslDom = xhrReq.responseXML;

				//alert("Finished loading both xml and xsl files. Started Transformation...");
				
				//var transformedString = zXslt.transformToText(xmlDom,xslDom);
				var xsltProcessor = new XSLTProcessor();
				xsltProcessor.importStylesheet(xslDom);
				
				newDom = xsltProcessor.transformToDocument(xmlDom);
				var xmlSerializer = new XMLSerializer();
				var transformedString = xmlSerializer.serializeToString(newDom);
				
				//alert("Finished Transformation. Adding to the web page..");
				
				//now update the page..
				//document.documentElement.innerHTML = transformedString;
				document.getElementById("DivQuestion").innerHTML = transformedString;

				document.getElementById("ButtonNext").disabled = false;
				document.getElementById("ButtonPrev").disabled = false;
				document.getElementById("Submit").disabled = true;	
				if(dispQueNo == 1)
				{
					document.getElementById("ButtonNext").disabled = false;
					document.getElementById("ButtonPrev").disabled = true;
					document.getElementById("Submit").disabled = true;		
				}
				if(dispQueNo == quesArray.length)
				{
					document.getElementById("ButtonNext").disabled = true;
					document.getElementById("ButtonPrev").disabled = false;
					document.getElementById("Submit").disabled = false;
					//disable Next button
					//enable submit button
				}
				if(ansSubmitted)
				{
					document.getElementById("Submit").disabled = true;
					document.getElementById("op1").disabled = true;
					document.getElementById("op2").disabled = true;
					document.getElementById("op3").disabled = true;
					document.getElementById("op4").disabled = true;					
					document.getElementById("ButtonMark").disabled = true;
					
					document.getElementById("RightAns").style.color = "green";
					document.getElementById("RightAns").innerHTML = "Correct Answer :" + quesArray[dispQueNo-1].lastChild.textContent;				
					if(quesArray[dispQueNo-1].lastChild.textContent == markedAns[dispQueNo-1])
					{				
						document.getElementById("RightAns").style.color = "green";
						document.getElementById("RightAns").innerHTML = "Correct Answer :" + quesArray[dispQueNo-1].lastChild.textContent;					
					}
					else
					{
						document.getElementById("IsAnsCor").style.color = "red";
						document.getElementById("IsAnsCor").innerHTML = "Wrong";					
					}
				}
				
				//alert("Finished adding to web page");				
			}
		}
	}
	xhrReq.open("GET","../xml/questions.xsl",true);
	xhrReq.send(null);	
}//end of function transformQueXml fn...


function Save()
{
	alert("Question Saved");
}


function setGridStatus()
{
	//we know que no... so  change color of those grid statusses..
	//alert("Changing grid status");
	setGridColorAnswered(dispQueNo+"");
	if(document.getElementById("op1").checked)
		markedAns[dispQueNo-1] = document.getElementById("op1").value;
	else if(document.getElementById("op2").checked)
		markedAns[dispQueNo-1] = document.getElementById("op2").value;
	else if(document.getElementById("op3").checked)
		markedAns[dispQueNo-1] = document.getElementById("op3").value;	
	else if(document.getElementById("op4").checked)
		markedAns[dispQueNo-1] = document.getElementById("op4").value;			
	else
		markedAns[dispQueNo-1] = "NA";	
}


function Reset()
{
	alert("Question Reset");
}

function NextQue()
{
	//alert("Next Question Retrieved.");
	dispQue(dispQueNo+1);
}

function PrevQue()
{
	//alert("Moved to Previous Question");
	dispQue(dispQueNo-1);
}

function MarkForReview()
{
	//mark currently loaded que for review..
	//alert("mark for review");
	setGridColorMarked(dispQueNo+"");
}

function sendAnsAndReqRes()
{
	ansSubmitted = true;
	correctAns = 0;
	wrongAns = 0;
	unAns = 0;
	totalQues = 0;
	for(var iter=0;iter<quesArray.length;iter++)
	{
		totalQues++;
		//document.getElementById("RightAns").style.color = "green";
		//document.getElementById("RightAns").innerHTML = "Correct Answer :" + quesArray[iter].lastChild.textContent;
		//alert("Correct Answer :" + quesArray[iter].lastChild.textContent);
		if(quesArray[iter].lastChild.textContent == markedAns[iter])
		{
			correctAns++;
			// document.getElementById("IsAnsCor").style.color = "green";
			// document.getElementById("IsAnsCor").innerHTML = "Correct";
		}
		else if(markedAns[iter] == "NA")
		{
			unAns++;
			// document.getElementById("IsAnsCor").style.color = "red";
			// document.getElementById("IsAnsCor").innerHTML = "Wrong";			
		}
		else
		{
			wrongAns++;
			// document.getElementById("IsAnsCor").style.color = "red";
			// document.getElementById("IsAnsCor").innerHTML = "Wrong";
		}
	}//end of for loop...
	dispQue(1);
	alert("Total No of questions: "+totalQues+"\n UnAnswered Questions: "+unAns+" \n Wrong Answers: "+wrongAns + " \nCorrect Answers: "+ correctAns);
}