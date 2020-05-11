<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_GET['delete'])){
       
   
        $GetID=$_GET['delete'];
        $query="delete from taxis where ID='".$GetID."'";
        
        mysqli_query($con,$query);
        header("location:admin-panel.php");
        
        

    }
    else{
        header("location:admin-panel.php");
    }


?>