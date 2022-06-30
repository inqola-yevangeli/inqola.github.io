<?php 
include "conn.php";

if(isset($_POST['id'])){
   $id=  $_POST['id'];

   $sql = "DELETE FROM posts WHERE id=".$id;
   mysqli_query($conn,$sql);
   echo 1;
   exit;
}

echo 0;
exit;
?>