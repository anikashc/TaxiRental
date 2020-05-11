<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_POST['book'])){
     
        $UserEmail=mysqli_real_escape_string($con,$_POST['bEmail']);
        $CarMake=mysqli_real_escape_string($con,$_POST['carMake']);
        $CarModel=mysqli_real_escape_string($con,$_POST['carModel']);
        $Amount=mysqli_real_escape_string($con,$_POST['amount']);

        if(empty($Amount)){
            header("location:view.php?Empty");
            exit();
        }
        else{
            date_default_timezone_set('Asia/Kolkata');
            $Date=date("d/m/Y");
            $query="insert into bookings(User_Email,Car_Make,Car_Model,Amount,Date)values ('$UserEmail','$CarMake','$CarModel','$Amount','$Date')";
            mysqli_query($con,$query);
            header("location:view.php?success");
            exit();
                    
        }
           
               
              
                        
             
            
        

    }
    else{
        header("location:view.php");
    }


?>