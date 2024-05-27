<?php
require ("../data/connect.php");
$sql = "SELECT * FROM  `catagory`";
$result=mysqli_query($conn,$sql);
while($row_data = mysqli_fetch_assoc($result)){
    $id=$row_data['Sno'];
    $cat = $row_data["Catagory"];

    echo "<li>
    <a class='navbar-brand' href='index.php?brand=$id'>
    $cat</li>";
    echo "<button class='my-3 mx-3 p-2 rounded-pill'>
    <a class='navbar-brand' href='delete.php?brand=$id'>
    Delete</button>";
    echo "<button class='my-3 p-2 rounded-pill'>
    <a class='navbar-brand' href='update1.php?brand=$id'>
    update</button>";
}
?>

<?
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_GET['delete'])){
        $del=$_GET['delete'];
        $sql1 ="DELETE from catagory where Sno='$del'";
        if (mysqli_query($conn, $sql1)) {
            header("location: index.php") or die('Error');
            } else{
                echo 'Error deleting record';
        }
    }
}
?>