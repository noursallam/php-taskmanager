<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahami_users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database (no need to select again if already selected in connection)
// $conn->select_db($dbname);

// Create the tasks table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$res = mysqli_query($conn, $sql);
if (!$res) {
    die("Error creating table: " . mysqli_error($conn));
}

// Handle form submission to add tasks
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    if (!empty($_POST['task'])) {
        $task = $_POST["task"];
        $sql = "INSERT INTO tasks (task) VALUES (?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $task);
        if ($stmt->execute() === false) {
            die("Error executing statement: " . $stmt->error);
        }

        // Redirect to refresh the page after adding task
        header('Location: todo.php');
        exit();
    }
}

// Handle deletion of tasks
// Handle deletion of tasks
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute() === false) {
        die("Error deleting record: " . $stmt->error);
    }

    // Redirect to refresh the page after deleting task
    header('Location: todo.php');
    
}

// Query to select all tasks from the database
$sql = "SELECT * FROM tasks";
$res = mysqli_query($conn, $sql);
if (!$res) {
    die("Error: " . mysqli_error($conn));
}




