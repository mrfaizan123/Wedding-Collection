<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Wedding_collection";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $Place = $_POST['Place'];
    $Amount = $_POST['Amount'];
    
    $stmt_insert = $conn->prepare("INSERT INTO your_table_name (name, place, amount) VALUES (?, ?, ?)");
    $stmt_insert->bind_param("sss", $name, $Place, $Amount);

    if ($stmt_insert->execute()) {
        echo "New member added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt_insert->close();
}

$conn->close();
?>
