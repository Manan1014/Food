<?php
$insert = false;
$duplicate = false;
// $catagory = $_POST['catagory'];
if(isset($_POST['insert-cart'])){
    require ("../data/connect.php");
    $cat_type = $_POST['type'];
    $cat_title = $_POST['cat_tite'];
    $cat_price = $_POST['cat_price'];
    $cat_quantity = $_POST['cat_quantity'];
    $cat_image = $_FILES['cat_image']['name'];
    $sql1 = "SELECT * FROM catagory WHERE `Name` = '$cat_title'";
    $result1 = mysqli_query($conn,$sql1);
    $num = mysqli_num_rows($result1);
    if ($num > 0){
        $duplicate = true;
    }
    else{
        $sql = "INSERT INTO `catagory` (`Type`,`Name`, `Price`, `quantity`, `Image`) VALUES ('$cat_type', '$cat_title', $cat_price, $cat_quantity, '$cat_image')";
        $result = mysqli_query($conn,$sql);
        move_uploaded_file($_FILES['cat_image']['tmp_name'],"../uploads/".$cat_image);
        $insert = true;
    }

}
?>
<form action="" method="POST" class="m-5" enctype="multipart/form-data">
<div class="input-group mb-3 w-90">

<select name="type" id="foods" class="form-select" aria-label="Default select example">
<option selected>Open this select menu</option>

 <?php
  require ("../data/connect.php");;
  $sql = "SELECT * FROM  `type`";
  $result=mysqli_query($conn,$sql);
  
  while($row = mysqli_fetch_assoc($result)){
    $cat_pro = $row["Type"];
    echo $cat_pro;
    echo '<option value="'.$row["Type"].'">'.$row["Type"].'</option>';
  }

?> 
  <option value="other">other</option>
</select>
</div>
<div class="input-group mb-3 w-90">
  <span class="input-group-text" id="basic-addon1"><i class="fa fa-car"></i></span>
  <input type="text" class="form-control" name="cat_tite" placeholder="Insert Name" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3 w-90">
  <input type="number" class="form-control" name="cat_price" placeholder="price" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3 w-90">
  <input type="number" class="form-control" name="cat_quantity" placeholder="Quantity" aria-label="Username" aria-describedby="basic-addon1">
</div>  
<div class="input-group mb-3 w-90">
  <input type="file" class="form-control" name="cat_image" placeholder="Upload Image" aria-label="Username" aria-describedby="basic-addon1">
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
if($duplicate == true){
  echo '<div class="alert alert-danger" role="alert">
  Sorry! .Item is Already Inserted
</div>';
}
?>