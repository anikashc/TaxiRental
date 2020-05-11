<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_POST['update'])){
       
        $CarMake=mysqli_real_escape_string($con,$_POST['carMake']);
        $CarModel=mysqli_real_escape_string($con,$_POST['carModel']);
        $CarYear=mysqli_real_escape_string($con,$_POST['carYear']);
        $TT=mysqli_real_escape_string($con,$_POST['transmissionType']);
        $Rate=mysqli_real_escape_string($con,$_POST['rate']);
        $GetID=$_GET['taxi_ID'];
        if(empty($CarMake)||empty($CarModel)||empty($CarYear)||empty($TT)||empty($Rate)){
            echo 'fill all the details';
            exit();
        }
        else{
            $query="update taxis set Car_Make='".$CarMake."', Car_Model='".$CarModel."', Car_Year='".$CarYear."', Transmission_Type='".$TT."', Rate_Per_Km='".$Rate."' where ID='".$GetID."'";
            mysqli_query($con,$query);
            header("location:admin-panel.php");
        }
        

    }
    else{
        header("location:admin-panel.php");
    }


?>