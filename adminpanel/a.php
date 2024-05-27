<?php
require('../data/connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_FILES['fileToUpload']['name'];
    if(empty($name)){
      echo 'Please select a file to upload.';
      }else{
        $sql = "INSERT INTO `im` (`Sno`, `Image`) VALUES (NULL, '$name')";
        // use exec() because no results are returned
        $result = mysqli_query($conn,$sql);
        if($result){
          echo "file success";
        }
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"../uploads/".$name);
        //echo '<img src="../uploads/'.$name.'" />';
        }
}
?>
<!DOCTYPE html>
<html>
<body>
<form action="a.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>