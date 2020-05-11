<?php 
    require_once('includes/connection.php');
    if(isset($_POST['register'])){
        $Name=mysqli_real_escape_string($con,$_POST['Name']);
        $DOB=mysqli_real_escape_string($con,$_POST['DOB']);
        $Email=mysqli_real_escape_string($con,$_POST['Email']);
        $Password=mysqli_real_escape_string($con,$_POST['Password']);
        if(empty($Name)||empty($DOB)||empty($Email)||empty($Password)){
            header("location:register.php?Empty");
            exit();
        }
        else{
            if(!preg_match("/^[a-z,A-Z,' ']*$/",$Name)){
                header("location:register.php?characters");
                exit();
            }
            else{
                if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
                    header("location:register.php?validemail");
                    exit();
                }
                else{
                    $query="select*from user_data where Email='".$Email."'";
                    $result=mysqli_query($con,$query);
                    if(mysqli_fetch_assoc($result)){
                        header("location:register.php?emailtaken");
                        exit();
                    }
                    else{
                        $HashPass=password_hash($Password,PASSWORD_DEFAULT);
                        date_default_timezone_set('Asia/Kolkata');
                        $Date=date("d/m/Y");
                        $query="insert into user_data(Name,DOB,Email,Password,Date)values ('$Name','$DOB','$Email','$HashPass','$Date')";
                        mysqli_query($con,$query);
                        header("location:register.php?success");
                        exit();
                    }
                }
            }
        }

    }
    else{
        header("location:register.php");
    }


?>