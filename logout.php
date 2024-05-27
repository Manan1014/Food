<?php
session_start();
if(isset($_SESSION['user'])) {
    session_unset();  
    session_destroy();
echo "session destroy success fully";
    } else {   
        echo "You are not logged in";  
    } 

?>