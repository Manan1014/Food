<?php
    require ("../data/connect.php");
    if(isset($_GET['brand'])){
        $id = $_GET['brand'];
        echo "$id";
        $sql = "DELETE FROM catagory WHERE Sno = $id";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "data deleted succes fully";
        }
        else{
            echo "please try later";
        }
    }
?>