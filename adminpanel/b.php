<?php
require ("../data/connect.php");
$sql = "SELECT * FROM  `im`";
$result=mysqli_query($conn,$sql);


while($row_data = mysqli_fetch_assoc($result)){
    $id=$row_data['Sno'];
    $img = $row_data["Image"];
    $link = "../uploads/$img    ";
    echo "$id";
    echo "<td>" . "<img src=".$link.' width=100px height="100px">' . "</td>";
    echo "$link";
    echo "<br>";

    // echo 
    // '<li>
    // <a class="navbar-brand" href="index.php?update">$cat</a>
    // </li>';
}