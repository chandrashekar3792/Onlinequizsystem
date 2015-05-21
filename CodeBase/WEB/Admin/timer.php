<form class="timer" method=""action="">
	<style>
	.timer{
		   width:100%;
		   height:60%;
		   
	       }
    </style>
	<fieldset>
		<link rel="stylesheet" href="../css/flipclock.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script src="../js/flipclock.js"></script>	
	</head>
	<body>
	<div class="clock" style="margin:2em;"></div>
	<div class="message"></div>

	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {
			
			clock = $('.clock').FlipClock({
		        clockFace: 'MinuteCounter'
		    });
		});
	
	</script>
	</fieldset>
</form>