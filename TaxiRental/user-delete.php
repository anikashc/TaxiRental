<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_GET['udelete'])){
       
   
        $GetID=$_GET['udelete'];
        $query="delete from user_data where ID='".$GetID."'";
        
        mysqli_query($con,$query);
        header("location:users.php");
        
        

    }
    else{
        header("location:users.php");
    }


?>