<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Two - Factor Authentication</title>
    <script type="text/javascript" src="https://dashboard.luxand.cloud/face-login.js"></script>
</head>
<body>

<button onclick="javascript:add_face('912e179dfd13d55b144f4660e6317b08')">Turn on the facial recognition</button>

<script>
function face_link(face_token){
    xhr = new XMLHttpRequest();

    // replace this URL with your back-end script path 
    xhr.open('POST', 'linkface.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) 
            alert("Face successfully linked")
        else if (xhr.status !== 200) 
            alert("Couldn't link the face")
    };
    xhr.send(encodeURI('face_token=' + face_token));
}
</script>
</body>
</html>