
<?php
require ("data/nabar.php");
//include the top menu bar
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require ("data/connect.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users Where email='$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num ==1){
    while($row=mysqli_fetch_assoc($result)){
        if (password_verify($password, $row['Password'])){
          $login = true;
          // session_start();
          $_SESSION['user']  = $email;
          // echo $_SESSION['user'];
          // header("Location: welocme.php");

       echo "You Are Login Succesfully";
      //  echo '<div class="alert alert-primary" role="alert">
      //  A simple primary alert—check it out!
    //  </div>';

       exit();
        }
        else{
            echo "Your Password is Wrong";
        }
    }
  } 
    else{
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> You Are not Registered...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
}
?>
<style>
  .form-control{
    background-color: #cfbcbc;
  }
</style>
<div class="container">
<form action="login.php" method="POST">
<h3 style="text-align: center;">Welcome To Login Page</h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name ="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn bg-info">Submit</button>
  <button type="reset" class="btn" >Reset</button>
</form>
</div>