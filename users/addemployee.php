<?php
include 'db_connect.php';

// Assuming your db_connect.php file includes the database connection code (e.g., $conn)

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $company = $_POST["company"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, company) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $company);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Employee added successfully";
    } else {
        // Handle the error
        echo "Error adding employee: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method";
}


?>
