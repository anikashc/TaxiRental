<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_POST['add'])){
       
        $CarMake=mysqli_real_escape_string($con,$_POST['carMake']);
        $CarModel=mysqli_real_escape_string($con,$_POST['carModel']);
        $CarYear=mysqli_real_escape_string($con,$_POST['carYear']);
        $TT=mysqli_real_escape_string($con,$_POST['transmissionType']);
        $Rate=mysqli_real_escape_string($con,$_POST['rate']);
        
        if(empty($CarMake)||empty($CarModel)||empty($CarYear)||empty($TT)||empty($Rate)){
            echo 'fill all the details';
            exit();
        }
        else{
            $query="insert into taxis(Car_Make,Car_Model,Car_Year,Transmission_Type,Rate_Per_KM)values ('$CarMake','$CarModel','$CarYear','$TT','$Rate')";
            mysqli_query($con,$query);
            header("location:admin-panel.php?success");
        }
        

    }
    else{
        header("location:admin-panel.php");
    }


?>