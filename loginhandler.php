<?php


#start session 
session_start();


if(isset($_SESSION['user_id'])){


}

// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahami_users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$errors=[];


if(isset($_POST['login_btn'])){
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $pass=filter_var($_POST['password'],FILTER_SANITIZE_STRING);


    if (!empty($email) && !empty($pass)) {
        
        








    } else {
        $errors[] = "Email and password are required.";
    }
    
}





































?>