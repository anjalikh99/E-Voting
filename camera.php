<html>
<head>
	<title>pic capture</title>
</head>
<body>
	<video id="player" playsinline autoplay></video>
	<button id="capture">Capture</button>
	<canvas id="canvas" width="640" height="480"></canvas>
	<script type="text/javascript">
		const player = document.getElementById('player');
		const canvas = document.getElementById('canvas');
		const context = canvas.getContext('2d');
		const captureButton = document.getElementById('capture');

		const constraints = {
			video : true
		};

		captureButton.addEventListener('click', ()=> {
            context.drawImage(player, 0, 0,canvas.width, canvas.height);
            
            //stop video streams
            player.srcObject.getVideoTracks().forEach(track => track.stop());
            player.display = "none";
		});

		navigator.mediaDevices.getUserMedia(constraints).then((stream) => {
			player.srcObject = stream;
		});
	</script>