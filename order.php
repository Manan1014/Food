<?php
session_start();
if(isset($_SESSION['cart'])){
$sum = $_SESSION['cart'];
echo "$sum";
}else{
    if(isset($_SESSION['user'])){
    echo "<h2>Please Add Some Item</h2>";
}
else{
    echo "Please Login";
}
}
?>
<?php


?>