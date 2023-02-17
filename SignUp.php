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
  $username = $_REQUEST['username'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  $mobile = $_REQUEST['mobile'];
  $role = $_REQUEST['role'];

  if (empty($username)) {
    echo "data is empty";
  } else {
    $sql = "INSERT INTO users ( name, email, password,mobile, role) VALUES ('$username','$email','$password','$mobile','$role')";

    if (mysqli_query($conn, $sql)) {
    } else {
      echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
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

  <title>SignUp</title>
  <script>
    function validate() {

      if (!document.getElementById("password").value == document.getElementById("cpassword").value) alert("Passwords do no match");
      return document.getElementById("password").value == document.getElementById("cpassword").value;
      return false;
    }
  </script>
</head>

<body>
  <?php
  require 'widget/nav.php';
  ?>
  <!-- Start Page Loading -->

  <form class="w-50 p-3" action="SignUp.php" method="post">
    <div class="form-group ">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

    </div>
    <div class="form-group ">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password">

    </div>
    <div class="form-group">
      <label for="cpassword">Confirm Password</label>
      <input type="password" class="form-control" id="cpassword" name="cpassword">
      <small id="emailHelp" class="form-text text-muted">Confirm Your Password</small>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile Number</label>
      <input type="tel" class="form-control" id="mobile" name="mobile">
    </div>
    <Label>Your Role</Label>
    <select class="form-control form-control-lg" name="role">
      <option ">Select Role</option>
        <option value=" teacher">Teacher</option>
      <option value="student">Student</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <section class="h-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Student registration form</h3>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m">First name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1n" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n">Last name</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m1" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m1">Mother's name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1n1" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n1">Father's name</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example8" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example8">Address</label>
                  </div>

                  <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                    <h6 class="mb-0 me-4">Gender: </h6>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="option1" />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="option2" />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline mb-0">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="option3" />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <select class="select">
                        <option value="1">State</option>
                        <option value="2">Option 1</option>
                        <option value="3">Option 2</option>
                        <option value="4">Option 3</option>
                      </select>

                    </div>
                    <div class="col-md-6 mb-4">

                      <select class="select">
                        <option value="1">City</option>
                        <option value="2">Option 1</option>
                        <option value="3">Option 2</option>
                        <option value="4">Option 3</option>
                      </select>

                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example9" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example9">DOB</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example90" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example90">Pincode</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example99" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example99">Course</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example97" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example97">Email ID</label>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="button" class="btn btn-light btn-lg">Reset all</button>
                    <button type="button" class="btn btn-warning btn-lg ms-2">Submit form</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
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