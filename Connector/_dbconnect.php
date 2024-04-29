<?php
// Database connection parameters
$server = "localhost"; // The hostname or IP address of the MySQL server
$username = "root"; // The MySQL username
$password = ""; // The MySQL password
$database = "rentalMovieDB"; // The name of the MySQL database

// Attempt to establish a connection to the MySQL server
$conn = mysqli_connect($server, $username, $password, $database);

// Check if the connection was successful
if ($conn) {
    // Connection successful, do nothing (You might want to perform additional actions here)
} else {
    // Connection failed, terminate the script and display an error message
    die("Error: " . mysqli_connect_error());
}
?>
