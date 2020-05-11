<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_GET['edit'])&&isset($_SESSION['admin'])){
        $Get_ID=$_GET['edit'];
        $query="select *from taxis where ID='".$Get_ID."'";
        $result=mysqli_query($con,$query);
        while($rows=mysqli_fetch_assoc($result)){

            $TaxiID=$rows['ID'];
            $CarMake=$rows['Car_Make'];
            $CarModel=$rows['Car_Model'];
            $CarYear=$rows['Car_Year'];
            $TT=$rows['Transmission_Type'];
            $Rate=$rows['Rate_Per_KM'];
        }
    }
    else{
        header("location:admin-login.php");
    }
    
?>
<h3 class="text-center text-white pt-5">Taxi Rental</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="update.php?taxi_ID=<?php echo $TaxiID?>" method="post">
                            <h3 class="text-center text-info">Edit </h3> 
                            <div class="form-group">
                                <label for="carMake" class="text-info">Car Make:</label><br>
                                <input type="text" Name="carMake" id="carMake" class="form-control"  value="<?php echo $CarMake ?>">
                            </div>
                            <div class="form-group">
                                <label for="carModel" class="text-info">Car Model:</label><br>
                                <input type="text" Name="carModel" id="carModel" class="form-control"  value="<?php echo $CarModel ?>">
                            </div>
                            <div class="form-group">
                                <label for="carYear" class="text-info">Car Year:</label><br>
                                <input type="number" Name="carYear" id="carYear" class="form-control"  value="<?php echo $CarYear ?>">
                            </div>
                            <div class="form-group">
                                <label for="transmissionType" class="text-info">Transmission Type:</label><br>
                                <input type="text" Name="transmissionType" id="transmissionType" class="form-control"  value="<?php echo $TT ?>">
                            </div>
                            <div class="form-group">
                                <label for="rate" class="text-info">Rate Per KM(₹):</label><br>
                                <input type="number" Name="rate" id="rate" class="form-control"  value="<?php echo $Rate ?>">
                            </div>
                                <div class="form-group">
                                    <input type="submit" name="update" class="btn btn-info btn-md" value="Update">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<a href="admin-panel.php" class="text-info">Back</a> <br>
<?php require_once('includes/footer.php');?>