<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "curdphp";

// Create connection
// $conn = new mysqli_connect($servername, $username, $password, $db);
$conn = new mysqli($servername, $username, $password, $db);

/* if ($conn) {
    echo "connection hogya bacho";
} else {
    // echo "connection Mahe howa bacho";
    die("connection nahe howa bacho" . mysqli_connect_error());
} */

if ($conn->connect_error) {
    die("connection nahe howa bacho: " . $conn->connect_error);
}
echo "connection hogya bacho";
