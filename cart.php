<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      body{
        background-color: #DDD0C8;
      }
      .card{
        background-color: #e0cbcb;
      }
      .last{
        display: flex;
      }
      .final{
        display: flex;
        justify-content: center;
      }
      </style>
  </head>
  <body>
<?php
require("data/connect.php");
if (isset($_POST['quantity'])) {
    $id = $_GET["cid"];
    $qty=$_POST['quantity'];
    $sql1 = "select price from cart where Sno = $id";
    $result1 = mysqli_query($conn,$sql1);
    $quantity = $_POST['quantity'];
    $price=mysqli_fetch_array(mysqli_query($conn, $sql1));
    $p = $price[0];
    if (isset($_POST['increment'])) {
      $quantity++;
      $sql2 = "UPDATE cart SET total = $quantity * $p WHERE Sno = $id";
      $sql="UPDATE `cart` SET quantity='$quantity'WHERE Sno=$id";
      $result=mysqli_query($conn,$sql);
      $result2=mysqli_query($conn,$sql2);
    } else if (isset($_POST['decrement'])) {
      $quantity--;
      $sql2 = "UPDATE cart SET total = $quantity * $p WHERE Sno = $id";
      $sql="UPDATE `cart` SET quantity='$quantity'WHERE Sno=$id";
      $result=mysqli_query($conn,$sql);
      $result2=mysqli_query($conn,$sql2);
    }
  
    // Save the new quantity in the database.
  }
?>
<?php
session_start();
//  echo $_SESSION['user'];
require ('data/connect.php');
if(isset($_SESSION['user'])){
if(isset( $_GET['id'])){
$id = $_GET['id'];
$sql = "select * from catagory where Sno = '$id'";

$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num == 1){
    $uid = $_SESSION['user'];
    $row = mysqli_fetch_array($result);
    $name = $row["Name"];
    $price = $row["Price"];
    $quantity = $row["quantity"];
    $img = $row["Image"];
    $sql1 = "SELECT * FROM cart Where Name='$name' AND ClientID = '$uid'";
    $result1 = mysqli_query($conn,$sql1);
    $num1 = mysqli_num_rows($result1);
    if($num1 > 0){
        echo "item is already added! You can update here";
    }
    else{
    $sql = "INSERT INTO `cart` (`ClientID`, `Name`, `Price`, `quantity`, `image`, `total`) VALUES ('$uid', '$name', $price, $quantity,'$img', $quantity * $price);";
    $result =  mysqli_query($conn,$sql);
    if($result){
        echo "Item Added in cart success fully";
    }
    else{
        echo "Item is not added in cart! Please try Again.";
    }
}
    }else{
        echo "No data found!";
}
}
 }
else{
    echo "For Adding item please login!";
}
?>
<?php
require ('data/connect.php');
// require ('data/nabar.php');
echo "<h2 class='text-center m-2 p-2'>welcome to cart</h3>";
if(isset($_SESSION['user'])){
$uid = $_SESSION['user'];
$sql = "select * from cart where ClientID = '$uid'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num > 0){
  echo '<div class="row row-cols-4 p-2 container d-flex flex-row justify-content-center">';
while ($row_data=mysqli_fetch_assoc($result)){
    $id=$row_data['Sno'];
    $name = $row_data["Name"];
    $cat_price = $row_data["Price"];
    $cat_totalprice = $row_data["total"];
    $cat_quantity = $row_data["quantity"];
    $img = $row_data["image"];
    $_SESSION['id'] =$id;
    $link = "uploads/$img    ";
    echo '<div class="card p-4 m-4" style="width: 20.5rem;">
    
    <img src='.$link.'  class="card-img-top"
            alt="Skyscrapers" style="height: 15rem">
            <div class="card-body">
        <h5 class="card-title text-center font-weight-bold" style="color: #725555;
        font-weight: bold;
        font-size: 25px;
    ">'.$cat_title.'</h5>
    <h5 class="card-title text-center font-weight-bold" style="color: #725555;
        font-weight: bold;
        font-size: 25px;
    ">Price:Rs.'.$cat_price.'</h5>
    <form action="?cid='.$id.'" method="post">
    <div class="input-group mb-3 justify-content-center">
  <button class="input-group-text" name="decrement">-</button>
  <input type="text" class="" value="'.$cat_quantity.'" name = "quantity"style="width:3rem;text-align:center">
  <button class="input-group-text"  name="increment">+</button>
</div>
</form>
    <h5 class="card-title text-center font-weight-bold" style="color: #725555;
    font-weight: bold;
    font-size: 25px;
">No of Item.'.$cat_quantity.'</h5>
<h5 class="card-title text-center font-weight-bold" style="color: #725555;
        font-weight: bold;
        font-size: 25px;
    ">Total Amount.'.$cat_totalprice.'</h5>
      </div>
    </div>';
    
}
echo '</div>';
$sql1 = "select SUM(total) from cart where ClientID = '$uid'";
$result1 = mysqli_query($conn, $sql1 );
$sum = mysqli_fetch_array($result1)[0];
$_SESSION['cart'] =$sum ;
echo '<div class="container final my-2 py-2">
<h3 class="text-center">'.$sum.'</h3>
<a href="order.php" class="justify-content-center last"><button type="submit" class="btn btn-primary text-center align-items-center mx-3 justify-content-center">OrderNow</button></a>
</div>';
// header('location:order.php?sum=' .$sum . '');
}
else{
  echo "<br>";
  echo "<h3>Your Cart is empty</h3>";
  echo "<br>";
  echo '<a href="welocme.php"><button type="submit" class="btn btn-primary text-center align-items-center m-3 p-2 justify-content-center">Continue Shopping</button></a>';
}
}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>