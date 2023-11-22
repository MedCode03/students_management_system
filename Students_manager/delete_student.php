<?php 
include "db_connection.php";
$id = $_GET["id"];
$sql = "DELETE  FROM students_list WHERE id = '$id'";
$query = mysqli_query($conn,$sql);
if($query){ 
    header('location:students_list.php');
}



?>