<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_POST['login'])){
       
        if(empty($_POST['email'])||empty($_POST['password'])){
            header("location:login.php?Empty");
            exit();
        }
        else{
            $Email=mysqli_real_escape_string($con,$_POST['email']);
            $Password=mysqli_real_escape_string($con,$_POST['password']);
            $query="select*from user_data where Email='".$Email."'";
            $result=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($result)){
                $Hash=password_verify($Password,$row['Password']);
                if($Hash==false){
                    header("location:login.php?pinvalid");
                    exit();
                }
                else if($Hash==true){
                    $_SESSION['User ID']=$row['ID'];
                    header("location:view.php");
                }
            }
            else{
                header("location:login.php?invalid");
                exit();
            }
        }
        

    }
    else{
        header("location:login.php");
    }


?>