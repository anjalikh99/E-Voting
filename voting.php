<!-- php page for adding a voter -->

<?php

$host = "localhost";
$user = "root";
$password = ''; // my database password. 
$db_name = "voter";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

if (isset($_REQUEST['email']) && $_REQUEST['email'] != '') {

    $userName = $_REQUEST['name'];
    $userEmail = $_REQUEST['email'];
    $adhaar = $_REQUEST['adhaarno'];
    $message = $_REQUEST['message'];
    $header = "From: anjalikhandelwal1999@gmail.com";

    $userName = stripcslashes($userName);
    $userEmail = stripcslashes($userEmail);
    $adhaar = stripcslashes($adhaar);
    $message = stripcslashes($message);
    $userName = mysqli_real_escape_string($con, $userName);
    $userEmail = mysqli_real_escape_string($con, $userEmail);
    $adhaar = mysqli_real_escape_string($con, $adhaar);
    $message = mysqli_real_escape_string($con, $message);

    $sql = "INSERT INTO `voterlogin` (`Name`, `Email`, `adhaarno`, `pass`) VALUES ('$userName', '$userEmail', '$adhaar', '$message');";
    $result = mysqli_query($con, $sql);

    if($result){
?>

<script>
    alert('Database Updated!')
    window.location.href = "index.php"
</script>
<?php
     
    }
}


?>




