<?php 
//connect to the data base
include "db_connection.php";


 

if(isset($_POST["btn"])) 
{ 
    $name = $_POST["name"];
    $cin = $_POST["cin"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if(!empty($name) && !empty($cin) && !empty($email) && !empty($password))
    {
        $sql = "SELECT * FROM students_list WHERE std_name = '$name' AND cin ='$cin'AND email = '$email' AND my_password = '$password' ";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query);
        if($result) 
        { 
            setcookie('username',$name,time()+180000);
            setcookie('cin',$cin,time()+180000);
            $msg = ' <p class="alert alert-success">connected with success</p>';
            header('location:students_space.php');
            
        } else 
           { 
            $sql = "SELECT * FROM admin_login WHERE std_name = '$name' AND cin_admin ='$cin'AND email_admin = '$email' AND my_password = '$password' ";
            $query = mysqli_query($conn,$sql);
            $result2 = mysqli_fetch_array($query); 
            if($result2) 
            { 
               
                $msg = ' <p class="alert alert-success">connected with success</p>';
                header('location:students_list.php');    
           }
        }
            
    }   
       
        else { $msg = ' <p class="alert alert-danger">wrong email or password !</p>'; }
    
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

    <title>login page students</title>
</head>
<body>
    <div class="container my-5">
        <h4><?= $_COOKIE['username'];?></h4>
        <h4><?= $_COOKIE['cin'];?></h4>
         <h3 class="text-primary "><i class="bi bi-box-arrow-in-right"></i> Login </h3>
         <?php echo $msg?>
         <form class="col-mx-6" action="login.php" method="post">
             <table class="table">
                 <tr>
                    <td>username :</td>
                    <td><input type="text" name="name"> </td>
                 </tr>
                 <tr>
                    <td>cin :</td>
                    <td><input type="text" name="cin"> </td>
                 </tr>
                 <tr>
                    <td>email :</td>
                    <td><input type="email" name="email"> </td>
                 </tr>
                 <tr>
                    <td>password :</td>
                    <td><input type="password" name="password"> </td>
                 </tr>
                 <tr>
                     <td><button class="btn btn-success" name="btn" type="submit">Connect</button></td>
                 </tr>
             </table>
         </form>
    </div>
</body>
</html>