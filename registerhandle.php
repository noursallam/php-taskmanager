

<?php 
// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahami_users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$errors = [];

if (isset($_POST['register_btn'])) {
    $name= filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate name
    if (empty($name)) {
        $errors[] = "يجب كتابة الاسم";
    } elseif (strlen($name) > 100) {
        $errors[] = "يجب ان لايكون الاسم اصغر من 100 حرف ";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "يجب كتابة البريد الاكترونى";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = "البريد الاكترونى غير صالح";
    }

    // Validate password
    if (empty($pass)) {
        $errors[] = "يجب كتابة كلمة المرور ";
    } elseif (strlen($pass) < 6) {
        $errors[] = "يجب ان لايكون كلمة المرور اقل من 6 حرف ";
    }

    if (empty($errors)) {
        // Prepare SQL statement
        $pass= password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

        // Check if the preparation was successful
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sss", $name, $email, $pass);

        // Execute the query
        if ($stmt->execute() === false) {
            die("Error executing statement: " . $stmt->error);
        }

        session_start();

        // Store user information in session variables
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;

        header("Location: login.php");
        // Close the statement
        $stmt->close();

        // Redirect to login.php
        
        exit();
    }
}

// Close the connection
$conn->close();

if (!empty($errors)) {
    ## juat foe testing ti check server errors 
    ##  var_dump($errors);
    
}
?>