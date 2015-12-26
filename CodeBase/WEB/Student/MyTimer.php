<!DOCTYPE html>
<!-- 
  Code done by: Phani
  Code for drawing and displaying wall clock on the browser..
-->
<html>
	<head>
		<title>
			THE WALL CLOCK
		</title>
		<script type="text/javascript">
		
			/* 
			 * For testing to check if the circle center is 
			 * exactly at the intersection of diagonals of clockCanvas
			 */
			function drawTestingCanvasDiagonals()
			{
			        /*
			           To check if the clock circle center and canvas center overlap correctly.
			           This fn is called only while debugging...
			        */
				clockContext.save();
				clockContext.beginPath()
				clockContext.moveTo(0,0)
				clockContext.lineTo(clockCanvas.width,clockCanvas.height)
				clockContext.moveTo(clockCanvas.width,0)
				clockContext.lineTo(0,clockCanvas.height)
				clockContext.stroke()
				clockContext.restore();
			}

			function drawClockCenter()
			{
				//to draw the center of the circle
				clockContext.save();
				clockContext.beginPath()
				clockContext.lineWidth = 3
				clockContext.arc(circleCenterX,circleCenterY,1,
				circleStartAngle,circleSweepAngle,drawArcClockWiseDir)
				clockContext.stroke()
				//clockContext.lineWidth = 1//default is 1, no need to set the value.
				clockContext.closePath();
				clockContext.restore();

			}
			
			
			function drawClockSkeletonCircle()
			{
				//to draw the skeleton of the circular clock watch									
				clockContext.save()
				clockContext.beginPath()
				clockContext.arc(circleCenterX,circleCenterY,circleRadius,
									circleStartAngle,circleSweepAngle,drawArcClockWiseDir)
				clockContext.stroke()
				clockContext.closePath()
				clockContext.restore();
				
				displayTimerNumbers()
			}
			
			function displayTimerNumbers()
			{
				clockContext.save()
				clockContext.translate(circleCenterX,circleCenterY);
				clockContext.fillStyle = "black"
				clockContext.textAlign = "right"
				
				var rotationAngle = radians(-90);//SET ROTATION angle initially to -90 deg, so that it points to 00:00 hrs
				clockContext.rotate(rotationAngle);
				
				/*
				   To draw all tics and numbers across the circumference of the clock..
				*/							
				for(var pos = 0; pos < 60; pos++)
				{
					//to display the clock numbers correctly at exact positions....
					if(pos%5 == 0)
					{
						var timeNum = pos/5;
						
						clockContext.font = "11pt Helvetica bold";
						if(timeNum == 0 || timeNum == 6  || timeNum == 7  || timeNum == 9  || timeNum == 10 )
						{
							clockContext.save()
							clockContext.fillText("-",circleRadius,0);							
							clockContext.translate(circleRadius,0)
							if(timeNum == 0)
							{
								clockContext.rotate(radians(90))
								clockContext.textBaseline = "top"
								//clockContext.fillText("12--",circleRadius,0);
								clockContext.fillText("12",0,0);
							}
							else if(timeNum == 9)
							{
								clockContext.rotate(radians(-180))
								clockContext.textBaseline = "middle"
								clockContext.textAlign = "left"
								clockContext.fillText("  "+timeNum.toString(),0,0);
							}	
							else 
							{									
								if(timeNum == 6)
								{
									clockContext.rotate(radians(-90))
									clockContext.textBaseline = "bottom"
									clockContext.textAlign = "left"
								}
								else if(timeNum == 7)
								{
									clockContext.rotate(radians(-120))
									clockContext.textBaseline = "bottom"
									clockContext.textAlign = "left"
								}
								else if(timeNum == 10)
								{
									clockContext.rotate(radians(-210))
									clockContext.textBaseline = "top"
									clockContext.textAlign = "left"
								}
								clockContext.fillText(timeNum.toString(),0,0);
							}
							clockContext.restore()
						}
						else
						{
							clockContext.fillText(timeNum.toString()+"--",circleRadius,0);
						}
					}
					else//to display the "-" symbol at correct positions..
					{
						clockContext.font = "10pt Helvetica italic";
						clockContext.fillText(" - ",circleRadius,0);
					}
					rotationAngle += radians(6);
					clockContext.rotate(radians(6));
					//if(rotationAngle > 90)
						//clockContext.rotate((Math.PI)-radians(30));
					//else
						//clockContext.rotate(radians(30));
				}
				clockContext.restore()
			}
			
			
			function drawClock()
			{
				
				clockCanvas = document.getElementById("clock_canvas")
				clockContext = clockCanvas.getContext("2d")
				if(!clockContext)
				{
					alert("Your Browser doens't support CANVAS object (:- So cannot draw the clock.. Sorry..")
				}
				else
				//else if canvas is supported by the browser then start displaying the clock.
				{
				        /*
				             Call this fn.. only for debugging purpose..
				        */
					//drawTestingCanvasDiagonals()
					
					/*
					   Setting clock circle center and radius..
					*/
					circleCenterX = (clockCanvas.width / 2)
					circleCenterY = (clockCanvas.height / 2)
					
					if(clockCanvas.width < clockCanvas.height)
						circleRadius = clockCanvas.width / 2
					else
						circleRadius = clockCanvas.height / 2
					
					circleRadius *= 0.70//setting to 70% of original value..
					
					circleStartAngle = 0
					circleSweepAngle = radians(360)
					drawArcAnti_ClockwiseDir = false//draw anti-clockwise direction
					drawArcClockWiseDir = true//draw in clock-wise direction
					
					/*
					   Setting percentage length of hr, min and sec hands of the clock..
					*/
					percentageLengthOfSecHand = 0.80
					percentageLengthOfMinHand = 0.70
					percentageLengthOfHrHand = 0.50
					
					/*
					   Parameter required for drawing the arrow at the end of hr and min hands of clock.
					*/
					arrowOffset = 15;
				
					drawClockCenter()
					drawClockSkeletonCircle()
					
					//initializeMinuteHrAndSecHands(true,0,0,0)
					
					/*
					   Obtain current system date and initialize the clock time ..
					*/
					var now = new Date();
                			//alert("Current System Time is: "+(now.getHours()).toString()+" hours, "+now.getMinutes()+" minutes, "+now.getSeconds()+" seconds")
                			//confirm("Current System Time is: "+(now.getHours()).toString()+" hours, "+now.getMinutes()+" minutes, "+now.getSeconds()+" seconds")
                			
					initializeMinuteHrAndSecHands(false,now.getHours(),now.getMinutes(),now.getSeconds())
				}
			}
			
			function setMinHrSecHandlesToDefPos()
			{
			        /*
			           Position the Hr, Min and Sec hands of clock to a default position..
			        */
				previousSecondHandDispAngle = radians(-90);
				previousMinuteHandDispAngle = radians(-90);
				previousHourHandDispAngle = radians(-90);
			}
			
			function initializeHourContext()
			{
			        /*
			          Initialize Hr context inside which the hour hand is drawn..
			        */
				hrHandCanvas = document.getElementById("hrHand_canvas")
				hrHandCanvas.style.position = "absolute"
				hrHandCanvas.style.left = clockCanvas.style.left
				hrHandCanvas.style.top = clockCanvas.style.top
				hrHandCanvas.width = clockCanvas.width
				hrHandCanvas.height = clockCanvas.height
				
				hrHandContext = hrHandCanvas.getContext("2d")				
				
				/*
				  Move the context to the center position of canvas such that it overlaps the center of the clock circle.
				*/
				hrHandContext.translate(circleCenterX,circleCenterY)
			}
			
			function initializeMinContext()
			{
			        /*
			                Initialize Minute context inside which the minute hand is drawn..
			        */			
				minHandCanvas = document.getElementById("minHand_canvas")
				minHandCanvas.style.position = "absolute"
				minHandCanvas.style.left = clockCanvas.style.left
				minHandCanvas.style.top = clockCanvas.style.top
				minHandCanvas.width = clockCanvas.width
				minHandCanvas.height = clockCanvas.height
				
				minHandContext = minHandCanvas.getContext("2d")				
				
				/*       
				 Move the context to the center position of canvas such that it overlaps the center of the clock circle.
				*/				
				minHandContext.translate(circleCenterX,circleCenterY)
			}
			
			function initializeSecContext()
			{
			        /*
			                Initialize Seconds context inside which the seconds hand is drawn..
			        */			
				secHandCanvas = document.getElementById("secHand_canvas")
				secHandCanvas.style.position = "absolute"
				secHandCanvas.style.left = clockCanvas.style.left
				secHandCanvas.style.top = clockCanvas.style.top
				secHandCanvas.width = clockCanvas.width
				secHandCanvas.height = clockCanvas.height
				
				secHandContext = secHandCanvas.getContext("2d")				
				
				/*       
				 Move the context to the center position of canvas such that it overlaps the center of the clock circle.
				*/
				secHandContext.translate(circleCenterX,circleCenterY)
			}
			
			function initializeMinuteHrAndSecHands(setToDefaults,hours,minutes,seconds)
			{
				continueAutoUpdateAction = true;
				
				if(setToDefaults)
					setMinHrSecHandlesToDefPos()
				
				else
				{
					setTimeAnglesFromTime(hours,minutes,seconds)
				}

				/*
					Seconds hand drawing control...
				*/
				initializeSecContext()
				drawSecondsHandle()
				
				/*
					Minute Hand drawing control...
				*/
				initializeMinContext()
				drawMinuteHandle()
				
				/*
					Hour Hand drawing control...
				*/
				initializeHourContext()
				drawHourHandle()
				
				/*
				   Setting interval timer to 1 sec, to update the time after every 1 second..
				*/
				setInterval("updateSecondsHandle()",1000)
			}
			
			/*
			   Draw the seconds handle of the clock at a specified angle...
			*/	
			function drawSecondsHandle()
			{
				secHandContext.save()
				secHandContext.rotate(previousSecondHandDispAngle)
				secHandContext.beginPath()
				secHandContext.moveTo(0,0)
				secHandContext.lineTo(percentageLengthOfSecHand*circleRadius,0)
				secHandContext.stroke()
				secHandContext.restore()
			}
			
		        /*
			   Draw the minute handle of the clock at a specified angle...
			*/	
			function drawMinuteHandle()
			{
								
				minHandContext.save()
				
				minHandContext.rotate(previousMinuteHandDispAngle)
				minHandContext.beginPath()
				minHandContext.moveTo(0,0)
				minHandContext.lineWidth = 2;
				minHandContext.lineTo(percentageLengthOfMinHand*circleRadius,0)
				minHandContext.stroke()
				{
					/*
					 * To draw arrows at the end of the minute handle..
					 */
					 minHandContext.save()
					 
					 //move to end of the minute handle, at the position where arrow is drawn...
					 minHandContext.translate(percentageLengthOfMinHand*circleRadius,0)
					 {
						minHandContext.fillStyle = "black"
						//again save and restore context once to draw arrow on both sides..
						minHandContext.save()
						
						//minHandContext.rotate((Math.PI/180)*150)
						minHandContext.rotate(radians(150))
						minHandContext.beginPath()
						minHandContext.moveTo(0,0)
						minHandContext.lineTo(arrowOffset,0)
						//clockContext.stroke()
						minHandContext.fill()
						
						minHandContext.restore()
						
						minHandContext.save()
						
						//minHandContext.rotate((Math.PI/180)*-150)
						minHandContext.rotate(radians(-150))
						minHandContext.lineTo(arrowOffset,0)
						//clockContext.stroke()
						minHandContext.fill()
						
						minHandContext.lineTo(0,0)
						minHandContext.fill()
						
						minHandContext.restore()
					 }
					 
					 //reqd to store original state of the context.
					 minHandContext.restore()
				}
				
				minHandContext.restore()
			}

		        /*
			   Draw the hour handle of the clock at a specified angle...
			*/
			function drawHourHandle()
			{
				hrHandContext.save()
				
				hrHandContext.rotate(previousHourHandDispAngle)
				hrHandContext.beginPath()
				hrHandContext.moveTo(0,0)
				hrHandContext.lineWidth = 2;
				hrHandContext.lineTo(percentageLengthOfHrHand*circleRadius,0)
				hrHandContext.stroke()
				{
					/*
					 * To draw arrows at the end of hour hande ..
					 */
					 hrHandContext.save()
					 
					 //move to end of the hour handle where the arrows are drawn...
					 hrHandContext.translate(percentageLengthOfHrHand*circleRadius,0)
					 {
						hrHandContext.fillStyle = "black"
						//again save and restore context once to draw arrow on both sides..
						hrHandContext.save()
						
						//hrHandContext.rotate((Math.PI/180)*150)
						hrHandContext.rotate(radians(150))
						hrHandContext.beginPath()
						hrHandContext.moveTo(0,0)
						hrHandContext.lineTo(arrowOffset,0)
						hrHandContext.fill()
						
						hrHandContext.restore()
						
						hrHandContext.save()
						
						hrHandContext.rotate(radians(-150))
						hrHandContext.lineTo(arrowOffset,0)
						hrHandContext.fill()
						
						hrHandContext.lineTo(0,0)
						hrHandContext.fill()
						
						hrHandContext.restore()
					 }
					 
					 //reqd to store original state of the context.
					 hrHandContext.restore()
				}
				//restore original hr hand context..
				hrHandContext.restore()
			}
			
			/*
			   Update the seconds handle drawing handle and clear seconds handle that was previously drawn..
			*/
			function updateSecondsHandle()
			{
                                /*
                                   Check if context is ready to be updated..
                                */
				if(continueAutoUpdateAction)
				{					
					//clear the previous rectangle, and re-draw second hand at new position..
					clearSecHandle();
			
					//update the seconds handle angle...
					//For every 1 second, the seconds handle rotates 6 degrees...
					previousSecondHandDispAngle = previousSecondHandDispAngle+(radians(6))
					
					//Check the angle value to be between 0 and 360 degrees only..
					previousSecondHandDispAngle = previousSecondHandDispAngle % (Math.PI*2); 
				
				        //draw seconds handle at new position..
					drawSecondsHandle();

					/*
					if(
						269 <= degrees(previousSecondHandDispAngle)  && 
						271 >= degrees(previousSecondHandDispAngle)
					   )
					{
						//alert("re-drawing minute handle")
						updateMinuteHandle()
					}
					else
					{
						drawMinuteHandle()
					}*/
					
					//update min handle for every 6 deg rotation of seconds handle..
					updateMinuteHandle()
				}
			}
			
			/*
			   Update the minute handle drawing handle and clear minute handle that was previously drawn..
			*/			
			function updateMinuteHandle()
			{
			        /*
                                   Check if context is ready to be updated..
                                */
				if(continueAutoUpdateAction)
				{
					//clear the previous rectangle, and re-draw minute hand at new position..
					clearMinHandle()
					
					//updare the minute handle angle...
					//previousMinuteHandDispAngle = previousMinuteHandDispAngle+(radians(6))
					//var rotationAngleInDeg = degrees(previousSecondHandDispAngle)
					//previousMinuteHandDispAngle = previousMinuteHandDispAngle+(radians((rotationAngleInDeg*(1/60))))//6*(6/360) degrees..
				
				        // For every 6 degree rotation of seconds hand, minute hand rotates for 6*(6/360) degrees i.e. 0.1 degrees..
					previousMinuteHandDispAngle = previousMinuteHandDispAngle+(radians(0.1))
					
					//Check the angle value to be between 0 and 360 degrees only..
					previousMinuteHandDispAngle = previousMinuteHandDispAngle % (Math.PI*2); 
				
				        //draw minute handle at new position..				
					drawMinuteHandle()			
					
					//update hour handle for every 0.1 degree rotation of minutes hand
					updateHourHandle()
				}
			}
			
			/*
			   Update the hour handle drawing handle and clear hour handle that was previously drawn..
			*/			
			function updateHourHandle()
			{
			        /*
                                   Check if context is ready to be updated..
                                */			
				if(continueAutoUpdateAction)
				{
				        //clear the previous rectangle, and re-draw hour hand at new position..
					clearHrHandle()
					
					// For every 0.1 degree rotation of minute hand, hour hand rotates for 0.1*(30/360) degrees.. i.e. 0.1/12 degrees 
					previousHourHandDispAngle = previousHourHandDispAngle+(radians((0.1/12)))

					
					//updare the hour handle angle...
					//var rotationAngleInDeg = degrees(previousMinuteHandDispAngle)
					//previousHourHandDispAngle = previousHourHandDispAngle+(radians((rotationAngleInDeg/12)))//0.1*(30/360) degrees..
					//Check the angle value to be between 0 and 360 degrees only..					
					previousHourHandDispAngle = previousHourHandDispAngle % (Math.PI*2); 
				
				        //draw hour handle at new position..
					drawHourHandle()
				}
			}
			
			/*
			   Given the time in seconds, calculate the angle by which the seconds hand needs to be rotated
			   and return the angle in degrees....
			*/
			function calcAngleFrmSecs(_secs)
			{
			        /*
			                Check that seconds value lies between 0 and 60
			        */
				if(_secs>=60)
					_secs = _secs%60;//_secs = _secs-60;
				
				//return value in degrees...
				//alert("angle for "+_secs.toString()+ " secs is : " + _secs*6 +" degrees")
				
				return _secs*6;//every 1 second corresponds to 6 degree rotation of seconds handle.
			}

			/*
			   Given the time in seconds and minutes, calculate the angle by which the minute hand needs to be rotated
			   and return the angle in degrees....
			*/			
			function calcAngleFrmMins(_mins,_secs)
			{
			        /*
			             Check that minutes and seconds values lies between 0 and 60
			        */			
				if(_mins>=60)
					_mins = _mins % 60//_mins = _mins - 60

				if(_secs>=60)
					_secs = _secs%60;//_secs = _secs-60;
				
				//return value in degrees...
				//alert("angle for "+_mins.toString() +" mins and " +_secs.toString()+ " secs is : " + (_mins*6)+(0.1*_secs) +" degrees")
				
				//every 1 minute corresponds to 6 degrees rotation of minute handle and every 1 second corresponds to 0.1 degree rotation of minutes handle.
				return _mins*6+0.1*_secs;//every minute is 6 degrees and "(6/60)*_secs" degrees..
			}

			/*
			   Given the time in hours and minutes, calculate the angle by which the hour hand needs to be rotated
			   and return the angle in degrees....
			*/			
			function calcAngleFrmHrs(_hrs,_mins)
			{
			        /*
			             Check that minutes and seconds values lies between 0 and 60
			        */			
				if(_mins>=60)
					_mins = _mins % 60//_mins = _mins - 60
					
			        /*
			             Check that hour value lies between 0 and 12
			        */
				if(_hrs>=12)
					_hrs = _hrs%12;//_hrs = _hrs-12;
					
				//return value in degrees...
				//alert("angle for "+_hrs.toString() +" hrs and "+_mins.toString() +" mins  is : " + (_hrs*30)+(0.5*_mins) +" degrees")
				//every 1 hour corresponds to 30 degrees rotation of hour handle and every 1 minute corresponds to 0.5 degree rotation of hour handle.
				return (_hrs*30)+(0.5*_mins);//every hr is 30 degrees and (30/60)*mins degrees..
			}
			
			/*
			        set the clock time i.e. inturn the angles made by hr,min and sec of the displayed clock on the page from the given time values.. 
			*/
			function setTimeAnglesFromTime(hours,minutes,seconds)
			{
				//alert("hrs: "+hours.toString()+" mns: "+minutes.toString()+" secs: "+seconds.toString())
				previousSecondHandDispAngle = (radians(-90))+(radians(calcAngleFrmSecs(seconds)));
				previousMinuteHandDispAngle = (radians(-90))+(radians(calcAngleFrmMins(minutes,seconds)));
				if(hours>12)
					hours = hours-12;
				previousHourHandDispAngle = (radians(-90))+(radians(calcAngleFrmHrs(hours,minutes)));
			}
			
			/*
			    Convert degrees to radians and return radians values..
			*/
			function radians(angleInDegrees)
			{
				return ((Math.PI/180)*angleInDegrees);
			}

			/*
			    Convert radians to degrees and return degrees values..
			*/			
			function degrees(angleInRadians)
			{
				return ((180/Math.PI)*angleInRadians);
			}
			
			/*
			        Erase the previously drawn hour handle from the hour hand context(canvas).
			*/
			function clearHrHandle()
			{
				hrHandContext.save()
				
				hrHandContext.rotate(previousHourHandDispAngle)
				
				//clear the rectangle within which the previously drawn hour handle recides in hour hand context..				
				hrHandContext.clearRect(0,-arrowOffset,percentageLengthOfHrHand*circleRadius,arrowOffset*2)
				//hrHandCanvas.width = hrHandCanvas.width;
				
				hrHandContext.restore()
			}
			
			/*
			        Erase the previously drawn minute handle from the minute hand context(canvas).
			*/			
			function clearMinHandle()
			{
				minHandContext.save()
				
				minHandContext.rotate(previousMinuteHandDispAngle)
				
				//clear the rectangle within which the previously drawn minutes handle recides in minute hand context..				
				minHandContext.clearRect(0,-arrowOffset,percentageLengthOfMinHand*circleRadius,arrowOffset*2)
				//minHandCanvas.width = minHandCanvas.width;
				
				minHandContext.restore()
			}
			
			/*
			        Erase the previously drawn seconds handle from the seconds hand context(canvas).
			*/
			function clearSecHandle()
			{
								
				secHandContext.save()
				
				secHandContext.rotate(previousSecondHandDispAngle)
				
				//clear the rectangle within which the previously drawn seconds handle recides in seconds hand context..
				secHandContext.clearRect(0,-10,percentageLengthOfSecHand*circleRadius,20)
				
				//secHandCanvas.width = secHandCanvas.width; 
				
				secHandContext.restore()
			}
			
			/*
			        Erase all the previously drawn hour, seconds and minute handles..
			*/
			function clearTimeHandles()
			{
				clearSecHandle()
				clearMinHandle()
				clearHrHandle()
			}
			
			/*
			 Set clock time to given time values by validating the time values..
			*/
			function onClickSetTime()
			{

				var createdElement = document.createElement("input");
				createdElement.setAttribute("type","time")
				
			        /*
			         Check if the browser supports "time" input type, 
			         if it does not support,obtain the time input as text and validate and set the timer. 
			        */				
				if(createdElement.type == "text")
				{
					var timeValue = document.getElementById("timeid").value
					if(timeValue.length != 8)
					{
						alert("Invalid Time input format. Enter time in \"hh:mm:ss\" format only. Enter hours value between 0 and 24 and minutes and seconds values between 0 and 60")
						return;
					}
					else
					{
						if(timeValue.indexOf(":") != 2 && timeValue.indexOf(":",3) != 5)
						{
							alert("Invalid Time input format. Enter time in \"hh:mm:ss\" format only. Enter hours value between 0 and 24 and minutes and seconds values between 0 and 60")							
							return;
						}
						else
						{
							var indexOfFirstColon = timeValue.indexOf(":");
			                                var indexOfSecondColon = timeValue.indexOf(":",3);
										
							if((indexOfFirstColon ==2 && indexOfFirstColon < timeValue.length)
							   &&
							   (indexOfSecondColon == 5 && indexOfSecondColon < timeValue.length)
							   )
							{
								var hour = timeValue.substr(0,indexOfFirstColon);
								var mins = timeValue.substr(indexOfFirstColon+1,indexOfSecondColon);
								var secs = timeValue.substr(indexOfSecondColon+1);
								hour = parseInt(hour);
								//alert("hour is : "+ hour)
								if(hour >= 0 && hour <= 24)
								{
									mins = parseInt(mins);
									secs = parseInt(secs);
									
									//alert("mins is : "+ mins)
									if((mins >= 0 && mins <= 60)
									    &&
									    (secs >= 0 && secs <= 60)
									   )
									{

										//alert("setting values");
										clearTimeHandles()
										continueAutoUpdateAction = false
										setTimeAnglesFromTime(hour,mins,secs);
										continueAutoUpdateAction = true;
									}
									else
									{
										alert("Invalid Time input format. Enter time in \"hh:mm:ss\" format only. Enter hours value between 0 and 24 and minutes and seconds values between 0 and 60")					
										
										return;
									}
								}
								else
								{
									alert("Invalid Time input format. Enter time in \"hh:mm:ss\" format only. Enter hours value between 0 and 24 and minutes and seconds values between 0 and 60")					
									return;

								}
							}
							else
							{
								alert("Invalid Time input format. Enter time in \"hh:mm:ss\" format only. Enter hours value between 0 and 24 and minutes and seconds values between 0 and 60")
							}
						}
					}
				}
				// if browser supports "time" input type, obtain the values and set the timer..
				else
				{
					var timeValue = document.getElementById("timeid").value
					if(timeValue == "")
					{
						alert("Invalid Time Format. Select correct time values from the list")
						return;
					}
					var indexOfColon = timeValue.indexOf(":");
					if(indexOfColon >= 0 && indexOfColon < timeValue.length)
					{
						var hour = timeValue.substr(0,indexOfColon);
						var mins = timeValue.substr(indexOfColon+1);
						clearTimeHandles()
						continueAutoUpdateAction = false
						setTimeAnglesFromTime(hour,mins,0);
						continueAutoUpdateAction = true;
					}
					else
					{
						alert("Invalid Time Format. Select correct time values from the list")
						return;
					}
				}
			}
		</script>
	</head>
	<body onload="drawClock()">
		<canvas id = "clock_canvas" width = "200" height = "200" style = "border:solid red;background:orange;position:absolute; top:0px; left:0px "></canvas>
        <canvas id = "hrHand_canvas" width = "200" height = "200" style="border:solid white;"></canvas>
		<canvas id = "minHand_canvas" width = "200" height = "200" style="border:solid white;"></canvas>
		<canvas id = "secHand_canvas" width = "200" height = "200" style="border:solid white;"></canvas>
	</body>
</html>
