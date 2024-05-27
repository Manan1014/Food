<?php
    require ("../data/connect.php");
 
    $id = $_GET['brand'];
    echo "$id";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // get data from form
            $replace = $_POST['cat_tite'];
            $sql = "UPDATE catagory SET Catagory =$replace WHERE Sno = $id ";
            // UPDATE `catagory` SET `Catagory` = 'ssss' WHERE `catagory`.`Sno` = 1;
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "data updated Succesfully";
            }
            else{
                echo "try after Some time";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" class="m-5">
        <div class="input-group mb-3 w-90">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-car"></i></span>
          <input type="text" class="form-control" name="cat_tite" placeholder="Insert Catagory" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 w-90">
          <input type="submit" class="bg-info border-0 p-2" name="insert-cart" placeholder="Insert Catagory" aria-label="Username" aria-describedby="basic-addon1">
          <!-- <button class="bg-info p-2 border-0" type="submit">Insert Catagory</button> -->
        </div>
        </form>
</body>
</html>