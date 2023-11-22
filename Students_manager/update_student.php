
<?php 
include "db_connection.php";
// get the row value 
$id = $_GET["id"];
$sql = "SELECT * FROM students_list WHERE id = '$id' ";
$result = mysqli_query($conn,$sql);
$arr = mysqli_fetch_array($result);

// update the data 
if(isset($_POST["update"])){ 
    $name = $_POST["name"];
    $cin = $_POST["cin"];
    $note = $_POST["note"];
    if(!empty($name) && !empty($cin) && !empty($note)){ 

$sql = "UPDATE  students_list  SET  std_name = '$name' , cin = '$cin',note = '$note' WHERE id = '$id' ";
   $query  =  mysqli_query($conn,$sql);
   if($query = mysqli_query($conn,$sql))
   { header('location:students_list.php');}else{header('location:update_student.php');}
} else{  $msg = ' <p class="alert alert-danger"> you mistake something </p>'; 
    $name = "";
    $cin = "";
    $note = "";

}
    

}else {$msg = ' <p class="alert alert-danger"> cannot updating student </p>';}







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
        <h3 class="text-primary"> <i class="bi bi-pencil-square"></i> Update Student</h3>
        <?php echo $msg; ?>
        
        <form action="" method="post">
             <table class="table " style="font-size:25px;"> 
             
                
                 <tr>
                 <td>Name :</td>
                 <td><input type="text" name="name" value="<?php echo $arr['1'] ?>"></td>


                 </tr>
                 <tr>
                    <td>CIN :</td>
                     <td><input type="text" name="cin" value="<?php echo  $arr['2'] ?>" ></td>
                    </tr>
                 <tr>
                 <td>Mark :</td>
                 <td><input type="text" name="note" value="<?php echo $arr['3'] ?>"></td>
                 </tr>
                 <tr> 
                  
                 <td class="col-mx-6">
                <button class="btn btn-success" type="submit" name="update"> Update <i class="bi bi-person-plus"></i> </button>
                <button class="btn btn-danger" type="submit" name="cancel">Cancel <i class="bi bi-x-circle-fill"></i> </button></td>
                 </tr>
                  
             </table>
        </form>
    </div>
</body>
</html>