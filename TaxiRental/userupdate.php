<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_POST['update'])){
       
        $Name=mysqli_real_escape_string($con,$_POST['name']);
        $DOB=mysqli_real_escape_string($con,$_POST['dob']);
        $Email=mysqli_real_escape_string($con,$_POST['email']);
        $GetID=$_GET['user_ID'];
        if(empty($Name)||empty($DOB)||empty($Email)){
            echo 'fill all the details';
            exit();
        }
        else{
            $query="update user_data set Name='".$Name."', DOB='".$DOB."', Email='".$Email."' where ID='".$GetID."'";
            mysqli_query($con,$query);
            header("location:users.php");
        }
        

    }
    else{
        header("location:users.php");
    }


?>