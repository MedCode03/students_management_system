<?php 
include "db_connection.php";
$std_name = "";
$std_cin = "";
$std_mark = "";
 
 if(isset(  $_POST["cancel"] )) 
{ 
$std_name = $_POST["std_name"];
$std_cin = $_POST["std_cin"];
$std_mark = $_POST["std_mark"];


    if(!empty($std_name) && !empty($std_cin) && !empty($std_mark)){ 
    $std_name = "";
    $std_cin = "";
    $std_mark = "";    
    }
  
}




if(isset($_POST["add"]))

{ 
$name = $_POST["std_name"];
$cin = $_POST["cin"];
$note = $_POST["note"];

    if(!empty($std_name) && !empty($std_cin) && !empty($std_mark) && $std_mark<20)
    { 
     
        $query = "INSERT INTO students_list (std_name,cin,note) VALUES  ('$name','$cin','$note')";
        mysqli_query($conn,$query);
        $msg = ' <p class="alert alert-success">adding student with success</p>'; 
        header('location:students_list.php');


      } else {   $msg = ' <p class="alert alert-danger"> error student not adding </p>';
    } 
    
}


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>add student</title>
</head>
<body>
    <div class="container py-5"> 
        <h3 class="text-primary"><i class="bi bi-person-plus"></i>Add New Student</h3>
        <?php echo $msg; ?>
        
        <form action="Add_student.php" method="post">
             <table class="table " style="font-size:25px;">
                 <tr>
                 <td>Name :</td>
                 <td><input type="text" name="name"></td>


                 </tr>
                 <tr>
                    <td>CIN :</td>
                     <td><input type="text" name="cin"></td>
                    </tr>
                 <tr>
                 <td>Mark :</td>
                 <td><input type="text" name="note"></td>
                 </tr>
                 <tr> 
                  
                 <td class="col-mx-6">
                <button class="btn btn-success" type="submit" name="add">Add <i class="bi bi-person-plus"></i> </button>
                <button class="btn btn-danger" type="submit" name="cancel">Cancel <i class="bi bi-x-circle-fill"></i> </button></td>
                 </tr>

             </table>
        </form>
    </div>
</body>
</html>



