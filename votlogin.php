<!-- Voter Login page -->

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<form name="login" action="login.php" onsubmit="return validation()" method="POST">
  <div class="imgcontainer">
    <img src="/project/images/blockv.png" alt="Voting" class="voting">
  </div>

  <div class="container">
    <label for="uname"><b>Adhaar Number</b></label>
    <input type="number" placeholder="Enter Adhaar Number" min="12" name="uname" id="adhaar" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="pass" required>

    <button type="submit">Login</button>
    <button type="button" onclick="location.href='index.html'">Back to Home Page</button>
  </div>
  <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        ?>
                        <script type="text/javascript">
                          alert("Invalid Adhaar Number or Password");
                        </script>
                        <?php
                    }
                ?>

</form>

<script>  
            function validation()  
            {  
                var id=document.login.adhaar.value;  
                var ps=document.login.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("Adhaar Number and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("Adhaar Number is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>