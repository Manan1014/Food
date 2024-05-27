<?php
require("data/nabar.php");
require("data/connect.php");
$showAlert = false;
$register = false;
$exist = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["email"];
  $phno = $_POST["phone"];
  $password = $_POST["pass"];
  $cpassword = $_POST["repass"];
  $sql1 = "SELECT * FROM users Where email='$username'";
  $sql2 = "SELECT * FROM users Where MobileNo='$phno'";
  $result1 = mysqli_query($conn, $sql1);
  $num1 = mysqli_num_rows($result1);
  $result2 = mysqli_query($conn, $sql2);
  $num2 = mysqli_num_rows($result2);
  if ($num1 > 0 || $num2 > 0) {
    $exist = true;
    if ($num1 > 0) {
      echo "<script>alert('Email Already Exist');</script>";
    }
    if ($num2 > 0) {
      $exist = true;
      echo "<script>alert('Phone Number already exist.');</script>";
    }
  } else if (empty($username)) {
    echo "<script>alert('Username is required')</script>";
  } else {
    if (($password == $cpassword) && $exist == false) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`MobileNo`, `email`, `Password`) VALUE('$phno','$username', '$hash');";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlert = true;
      }
    } else {
      $showError = "Both Password Are not same";
    }
  }

}
?>
<?php
if ($showAlert) {

  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
  exit();

}
?>
<style>
  .form-control{
    background-color: #cfbcbc;
  }
</style>
<div class="container my-3">
  <form action="signup.php" method="POST">
    <h3 style="text-align: center;">Welcome To Signup Page</h3>
    <div class="form-outline">
      <label class="form-label" for="typePhone">Phone number</label>
      <input type="tel" id="typePhone" class="form-control" name="phone">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="repass">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <div>
      <button type="submit" class="btn" style="background-color:rgb(163,163,163);">Submit</button>
      <button type="reset" class="btn" style="background-color:rgb(163,163,163);">Reset</button>
    </div>
  </form>
</div>