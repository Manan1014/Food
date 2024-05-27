<?php
$insert = false;
$uninsert = false;
if((isset($_POST['insert-cart']))){
  require('../data/connect.php');
  $product_type = $_POST["cat_product"];
  $sql1 = "SELECT * FROM type WHERE Type='$product_type'";
  $result1 = mysqli_query($conn,$sql1);
  $num = mysqli_num_rows($result1);
  if($num > 0){
    echo "This type is Already Inserted";
  }
  else{
  $sql = "INSERT INTO `type` (`Type`) values ('$product_type')";
  $result = mysqli_query($conn,$sql);
  if($result){
    $insert = true; 
  }
  else{
    $uninsert = false;
  }
}
}
?>
<form action="" method="POST" class="m-5" enctype="multipart/form-data">
<div class="input-group mb-3 w-90">
  <span class="input-group-text" id="basic-addon1"><i class="fa fa-car"></i></span>
  <input type="text" class="form-control" name="cat_product" placeholder="Insert type of Food that You Want to Add!.." aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3 w-90">
  <input type="submit" class="bg-info border-0 p-2" name="insert-cart" placeholder="Insert Catagory" aria-label="Username" aria-describedby="basic-addon1">
  <!-- <button class="bg-info p-2 border-0" type="submit">Insert Catagory</button> -->
</div>
</form>
<?php

  if($insert == true){
    echo '<div class="alert alert-success" role="alert">
    Success! <a href="#" class="alert-link">an example link</a>.Your Item Inserted Succesfully
  </div>';
  }
  if($uninsert == true){
    echo '<div class="alert alert-danger" role="alert">
    Sorry! Some Problem Occur Please try after Some time
  </div>';
  }
?>