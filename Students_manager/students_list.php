<?php 
include "db_connection.php";
$sql = "SELECT * FROM students_list";
$query = mysqli_query($conn,$sql);
$arr  = mysqli_fetch_assoc($query);

if(isset($_POST["btn_logout"]))
{ 
   $_COOKIE["username"] = "";
   $_COOKIE["cin"] = "";
   header('location: login.php');
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


    <title>students list</title>

</head>
<body>
 <div class="container mx-6 p-5 my-5">
  <form action="" method="post">

      <h2 class="text-primary text-bold my-3"> <i class="bi bi-card-list"></i> List Of Students</h2>
    <a href="Add_student.php"><button class="btn btn-primary"  name="add_std" type="submit">New Student  <i class="bi bi-person-plus-fill"></i></button></a> 
    <table class="table">
        <tr>
             <th>ID</th>
             <th>NAME</th>
             <th>CINE</th>
             <th>MARK</th>
        </tr>
        <?php while($arr = mysqli_fetch_array($query)){ ?>

        
        <tr>
          <td><?= $arr["id"] ?></td>
          <td><?= $arr["std_name"] ?></td>
          <td><?= $arr["cin"] ?></td>
          <td><?= $arr["note"] ?></td>
          <td><a href="update_student.php?id= <?= $arr["id"];?>"><div class="btn btn-success">Edit <i class="bi bi-pencil"></i></div></a></td>
          <td><a href="delete_student.php?id= <?= $arr["id"];?>"><div class="btn btn-danger">Delete <i class="bi bi-trash"></i></div></a></td>
        </tr>

        <?php } ?>
         <tr> <td><button name="btn_logout" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Logout</button></td></tr>
           
    </table>
  </form>
 
 </div>


    
</body>
</html>