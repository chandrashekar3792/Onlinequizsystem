// function sendQueRequest(fileName)
// {
	// if(fileName)
	// {
		// sendReq(fileName);
		// //transformXml(xml);
	// }
// }//end of fn loadAndTransformXml..

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
				transformQueXml(xhrReq.responseText);
			}
		}
	}//end of onreadystatechange() anonymous function...
	
	xhrReq.open("GET","getQuestionsBackend.php", true);
	xhrReq.send();
	//alert("Sent XHR request");
}//end of function sendReq..

function transformQueXml(xmlQueString)
{
	//alert("Transforming the received xml file");
	//var xmlDom = zXmlDom.createDocument();
	//var xmlDom =  document.implementation.createDocument("","",null);
	var domParser = new DOMParser();
	xmlDom = domParser.parseFromString(xmlQueString,"text/xml");
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


function Reset()
{
	alert("Question Reset");
}

function NextQue()
{
	alert("Next Question Retrieved.");
}

function PrevQue()
{
	alert("Moved to Previous Question");
}