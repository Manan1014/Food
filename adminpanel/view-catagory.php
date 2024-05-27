<?php
require ("../data/connect.php");
$sql = "SELECT * FROM  `catagory`";
$result=mysqli_query($conn,$sql);

echo     '<div class="row row-cols-3 g-3 p-3">';
while($row_data = mysqli_fetch_assoc($result)){
    $id=$row_data['Sno'];
    $cat_title = $row_data["Name"];
    $cat_price = $row_data["Price"];
    $cat_quantity = $row_data["quantity"];
    $img = $row_data["Image"];
    $link = "../uploads/$img    ";

    // echo "$id,$cat_title,$cat_price,$cat_quantity,$link";
    echo "<br>";


    echo '<div class="card p-3 m-3" style="width: 20.5rem;">
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
        <a href="#" class="btn btn-primary text-center align-items-center m-3 p-2" style="display:block">Add to Cart</a>
        <a href="#" class="btn btn-secondary text-center align-items-center m-3 p-2" style="display:block">View More</a>
      </div>
    </div>';

    // echo "<li>
    // <a class='navbar-brand' href='index.php?brand=$id'>
    // $cat</li>";
}

?>