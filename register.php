<?php
// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Your database connection details
$servername = "localhost";
$username = "vrt_safeboat";
$password = "vrt_safeboat";
$dbname = "vrt_safeboat";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Prepare the SQL statement
$sql = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashedPassword);
$stmt->bindParam(':name', $name);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->errorCode();
}
?>
