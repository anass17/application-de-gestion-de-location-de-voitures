<?php

$server = "localhost";
$username = "root";
$password = "root123";
$db = "cars_management";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// To insert

// $name = "John Doe";
// $email = "john.doe@example.com";
// $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// To Select
// $sql = "SELECT * FROM clients";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         echo '<pre>';
//         print_r($row);
//         echo '</pre>';
//     }
// } else {
//     echo "0 results";
// }