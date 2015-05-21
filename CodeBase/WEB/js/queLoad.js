// function sendQueRequest(fileName)
// {
	// if(fileName)
	// {
		// sendReq(fileName);
		// //transformXml(xml);
	// }
// }//end of fn loadAndTransformXml..
var quesArray = new Array();
var dispQueNo = 1;

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
				firstTimeLoad = true;
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
	if(!firstTimeLoad )
	{
	document.getElementById("ButtonNext").disabled = false;
	document.getElementById("ButtonPrev").disabled = false;
	document.getElementById("Submit").disabled = false;	
	}
	if(dispQueNo == 1)
	{
	//disable prev button...
	if(!firstTimeLoad )
	{
	document.getElementById("ButtonNext").disabled = false;
	document.getElementById("ButtonPrev").disabled = true;
	document.getElementById("Submit").disabled = true;		
	}
	}
	else if(dispQueNo == 24)
	{
	if(!firstTimeLoad )
	{
		document.getElementById("ButtonNext").disabled = true;
		document.getElementById("ButtonPrev").disabled = false;
		document.getElementById("Submit").disabled = false;
		//disable Next button
		//enable submit button
	}
	}
	if(firstTimeLoad )
		firstTimeLoad = false;
}

function transformQueXmlToArray(xmlQueString)
{
	var domParser = new DOMParser();
	xmlDom = domParser.parseFromString(xmlQueString,"text/xml");

	quesArray = xmlDom.firstChild.children;
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
}


function Reset()
{
	alert("Question Reset");
}

function dispSpecQue(queNo)
{
	dispQue(queNo);
}

function NextQue()
{
	//alert("Next Question Retrieved.");
	dispQue(dispQueNo+1);
}

function PrevQue()
{
	//alert("Moved to Previous Question");
	dispQue(dispQueNo+1);
}

function MarkForReview()
{
	//mark currently loaded que for review..
	setGridColorMarked(dispQueNo);
}