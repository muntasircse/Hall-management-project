<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "hall_manage";

$userId = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE users SET status=1 WHERE id=$userId";

$result = mysqli_query($conn, $sql);   

// if ($conn->query($sql) === TRUE) {

// } else {
//   echo "Error updating record: " . $conn->error;
// }

$conn->close();

header('Location: users_information.php');
?>