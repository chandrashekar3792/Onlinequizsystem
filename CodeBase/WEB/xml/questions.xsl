<?xml version="1.0" encoding="utf-8" ?>

<xsl:stylesheet version="1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" omit-xml-declaration="yes" indent="yes" />

<xsl:template match="/">
	<html>
		<head>
			<title>XSL Transformation for questions xml </title>
		</head>

		<body>
			<form method="POST" action="RequestResult.php" onsubmit="sendAnsAndReqRes(); return false">
				<fieldset>
					<xsl:apply-templates />
					<!--input type="button" name="ButtonNext" value="Next" onclick="NextQue()" /><pre>
					
					</pre-->
					<input type="submit" value="Submit"/>
				</fieldset>
			</form>
		</body>
	</html>
</xsl:template>

<xsl:template match="question">
	<xsl:variable name="_op1" select="op1" />
	<xsl:variable name="_op2" select="op2" />
	<xsl:variable name="_op3" select="op3" />
	<xsl:variable name="_op4" select="op4" />
	<p>
		<label style="width:500px"><xsl:value-of select="QText" />:</label><br />
		<input type="radio" name="options" value="{$_op1}"/> <label><xsl:value-of select="$_op1" /></label><br />
		<input type="radio" name="options" value="{$_op2}"/> <label><xsl:value-of select="$_op2" /></label><br />
		<input type="radio" name="options" value="{$_op3}"/> <label><xsl:value-of select="$_op3" /></label><br />
		<input type="radio" name="options" value="{$_op4}"/> <label><xsl:value-of select="$_op4" /></label><br />
		<input type="button" value="Save" id="ButtonSave" onclick="Save()" />
		<input type="button" value="Reset" id="ButtonReset" onclick = "Reset()" />
	</p>
	
</xsl:template>


</xsl:stylesheet>