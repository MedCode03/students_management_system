<?php 

include "db_connection.php";

if(isset($_POST['btn']))

{  $_COOKIE['username']  = " ";
   $_COOKIE['cin']  = " ";
   header('location: login.php');
   

}else{echo "error";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>

<div class="container  my-5">
    <div class="col col-sm-6">
         <h1 class="text-dark">Hello , <span class="text-info"><?= $_COOKIE['username']?></span></h1>
         <table class="table"> 
              <tr>
                <th>student name</th>
                <th>CINE</th>
                <th>mark</th>
              </tr>
              <tr>
                <td><?= $_COOKIE['username']?></td>
                <td><?= $_COOKIE['cin']?></td>
                <td>15</td>
              </tr>
         </table>

<tr> 
  <form method="post" action="">
    <td><button  name="btn" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Logout</button></td>
</form>
  
</tr>

    </div>


</div>
</body>
</html>






