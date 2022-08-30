<?php
 include 'conn.php';
 
    $id=$_GET['id'];
    $table=$_GET['table'];
    $returnUrl=$_GET['returnUrl'];

    $sql="DELETE FROM $table WHERE id='".$id."'";
      $query= mysqli_query($conn,$sql);
    header('location:'.$returnUrl); 
?>
