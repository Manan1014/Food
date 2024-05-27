<?php
require ("data/nabar.php");
?>
<style>
  .card{
  background-color: #e0cbcb; ;
  }
</style>
<div id="carouselExampleIndicators" class="carousel slide m-3 bg-red mt-0.2" style="height:80%">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active h-50 w-40">
      <img src="data/Food3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="data/Food (1).png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="data/Food (2).png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="data/Food.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php
require ("data/connect.php");
$sql = "select * from catagory where type='other'";
$result=mysqli_query($conn,$sql);

echo     '<div class="row row-cols-4 p-2 container d-flex flex-row justify-content-center">';
while($row_data = mysqli_fetch_assoc($result)){
    $id=$row_data['Sno'];
    $cat_title = $row_data["Name"];
    $cat_price = $row_data["Price"];
    $cat_quantity = $row_data["quantity"];
    $img = $row_data["Image"];
    $link = "uploads/$img";
    echo "<br>";
    echo '
    <div class="card p-3 m-3 col justify-content-center " style="width: 20.5rem;">
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
?>
<script src="script.js"></script>