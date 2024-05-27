<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Bootstrap demo</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- CSS only -->
    <style>
        .card{
  background-color: #e0cbcb; ;
  }
  body{
        background-color: #DDD0C8;
      }
    </style>
  </head>
  <body>
<?php
if(isset($_GET["name"])){
    require("data/connect.php");
    $ptype = $_GET["name"];
    $sql = "select * from catagory where type='$ptype'";
    $result = mysqli_query($conn,$sql);
    echo '<div class="row row-cols-4 p-2 container d-flex flex-row justify-content-center">';
    while($row_data = mysqli_fetch_assoc($result)){
        $id=$row_data['Sno'];
        $cat_title = $row_data["Name"];
        $cat_price = $row_data["Price"];
        $cat_quantity = $row_data["quantity"];
        $img = $row_data["Image"];
        $link = "uploads/$img    ";
    
        // echo "$id,$cat_title,$cat_price,$cat_quantity,$link";
        echo "<br>";
    
    
        echo '
        <div class="card p-3 m-3" style="width: 20.5rem;">
        <form action="cart.php" method="POST">
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
            <a  type="submit" href="cart.php?id='.$id.'" class="btn btn-primary text-center align-items-center m-3 p-2" style="display:block">Add to Cart</a>
            <a href="#" class="btn btn-secondary text-center align-items-center m-3 p-2" style="display:block">View More</a>
          </div>
        </div>
        </form>';
    }
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>