<?php
// Database connection parameters
$server = "localhost"; // The hostname or IP address of the MySQL server
$username = "root"; // The MySQL username
$password = "Tuesday06062023"; // The MySQL password
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

// SQL query to select all data from the "movies" table
$sql = "SELECT * FROM movies";

// Execute the query and store the result
$result = $conn->query($sql);

$data = array(); // Array to store the retrieved data

// Retrieve the data and store it in the array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Send the data as a response in JSON format
echo json_encode($data);
?>
