<?php
session_start();
$account_id = $_SESSION["Email"];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.luxand.cloud/token/" . $_POST["face_token"],
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => [ 
        "id" => $account_id // account_id can be email, username or numerical ID
    ], 
    CURLOPT_HTTPHEADER => array( "token: a3a0f7a4dde2455bb4e5866874ebc59f" )
));

curl_exec($curl);
curl_close($curl);
?>