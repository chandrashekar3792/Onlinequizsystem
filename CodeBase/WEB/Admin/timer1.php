<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Timer</title>

</head>
<body>
   <div class="timer" id="timer">00:00</div> 
   <div class="buttons">
      <button onclick="startTimer()" id="button1">Start</button>
      <button onclick="stopTimer()" id = "button2">Stop</button>
   </div>

</body>

<script>

var w = null; // initialize variable

// function to start the timer
function startTimer()
{
   // First check whether Web Workers are supported
   if (typeof(Worker)!=="undefined"){
      // Check whether Web Worker has been created. If not, create a new Web Worker based on the Javascript file simple-timer.js
      if (w==null){
         w = new Worker("simple-timer.js");
      }
      // Update timer div with output from Web Worker
      w.onmessage = function (event) {
         document.getElementById("timer").innerHTML = event.data;
      };
   } else {
      // Web workers are not supported by your browser
      document.getElementById("timer").innerHTML = "Sorry, your browser does not support Web Workers ...";
   }
}

// function to stop the timer
function stopTimer()
{
   w.terminate();
   timerStart = true;
   w = null;
}
</script>

</html>