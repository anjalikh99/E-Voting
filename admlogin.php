<!-- Admin login PHP code -->

<?php      
    
    session_start();
    $curl = curl_init();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "admin";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $email = $_POST['uname'];  
    $pass = $_POST['psw'];

      
        //to prevent from mysqli injection  
       $email = stripcslashes($email); 
       $pass = stripcslashes($pass);
       $email = mysqli_real_escape_string($con, $email);
       $pass = mysqli_real_escape_string($con, $pass);
      
        $sql = "SELECT * from `adminlogin` WHERE `Email` = '$email' AND `Password` = '$pass'"; 
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
          
        if($count == 1){  
            $_SESSION["Email"] = $email;
            $_SESSION["Pass"] = $pass;
            /*curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.luxand.cloud/token/" . $_POST["face_token"],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array( "token: a3a0f7a4dde2455bb4e5866874ebc59f" )
            ));

            $response = json_decode(curl_exec($curl));
            curl_close($curl);

            if ($response->status == "success")
            {
                print("User ID is " . $response->id . "\n");
                header("Location: dashboard.html");
            }
            else {
                header("HTTP/1.0 401 Unauthorized");
                print("Couldn't find a user with this face\n");
            }*/
            header("Location: dashboard.html");
            
        }  
        else if($count != 1){  
            $_SESSION["error"] = "Invalid Email or Password";
            header("Location: adlogin.php");
        }     
?>  