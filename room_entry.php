<?php
include 'data/db_connect.php';


?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hall_manage";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // collect value of input field
    $roomnumber = $_REQUEST['roomnumber'];
    $seat= $_REQUEST['seat'];
    
    if (empty($roomnumber)) {
        echo "data is empty";
    } else {
        
        $checkDuplicateRoomsql = "select roomNumber from room where roomNumber='$roomnumber'";
        $result = $conn->query($checkDuplicateRoomsql);

        if(!empty($result) && $result->num_rows > 0){
             
            if($roomnumber == $roomnumber){
                echo "already Room Exists";
            }
        }else{
            $insertRoomSql = "INSERT INTO room ( roomnumber, seat) VALUES ('$roomnumber','$seat')";
            mysqli_query($conn, $insertRoomSql);
        }
       

        // Close connection
        mysqli_close($conn);

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Room</title>
</head>
<body>
<?php
require 'widget/nav_teacher.php';
?>
<form class="w-50 p-3" action="room_entry.php" method="post">
    <div class="form-group">
        <label for="roomnumber">Room Number</label>
        <input type="number" class="form-control" id="roomnumber" aria-describedby="emailHelp" name="roomnumber" placeholder="Room number">
       
    </div>
    <div class="form-group">
        <label for="seat">Seat</label>
        <input type="number" class="form-control" id="seat" name="seat" placeholder="Seat">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>
