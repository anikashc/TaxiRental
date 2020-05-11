<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_POST['login'])){
       
        if(empty($_POST['email'])||empty($_POST['password'])){
            header("location:admin-login.php?Empty");
            exit();
        }
        else{
            $Email=mysqli_real_escape_string($con,$_POST['email']);
            $Password=mysqli_real_escape_string($con,$_POST['password']);
            $query="select*from admin where Admin_Email='".$Email."' and Admin_Password=MD5('".$Password."')";
            $result=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($result)){
                $_SESSION['admin']=$row['Admin_Email'];
                header("location:admin-panel.php");
            }
            else{
                header("location:admin-login.php?invalid");
                
            }
        }
        

    }
    else{
        header("location:admin-login.php");
    }


?>