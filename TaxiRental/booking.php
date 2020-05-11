<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_GET['id'])&&(isset($_SESSION['User ID'])||isset($_SESSION['admin']))){
        $Get_ID=$_GET['id'];
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
        $Get_UID=$_SESSION['User ID'];
        $query1="select *from user_data where ID='".$Get_UID."'";
        $result1=mysqli_query($con,$query1);
        while($rows1=mysqli_fetch_assoc($result1)){
            $Email=$rows1['Email'];
        }
    }
    else{
        header("location:login.php");
    }
    
?>
        <h3 class="text-center text-white pt-5">Taxi Rental</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    

                    <h4 class="text-center text-info">Rate Calculator </h4>
                            <form  class="form" action="#" method="post"> 
                                <div class="form-group">
                                    <label for="distance" class="text-info"> Distance to be travelled: </label><br>
                                    <input type="number" Name="distance" id="distance" class="form-control">
                                </div>
                                <input type="submit" name="calculate" class="btn btn-info btn-md" value="Calculate">
                                <?php
                                    $sum="";
                                    if(isset($_POST['calculate'])){
                                        $distance=$_POST['distance'];
                                        $sum=$Rate*$distance;

                                    }

                                ?>
                                <div class="form-group">
                                    <label for="amount" class="text-info">Amount</label><br>
                                    <input type="number" Name="amount" id="amount" class="form-control" value="<?php echo $sum ?>" readonly >
                                </div>
                                
                            </form>



                        <form id="login-form" class="form" action="bookingphp.php" method="post"> 
                        <h3 class="text-center text-info">Booking </h3>
                            <div class="form-group">
                                <label for="bEmail" class="text-info">Booking Email:</label><br>
                                <input type="text" Name="bEmail" id="bEmail" class="form-control"  value="<?php echo $Email ?>" readonly>
                            </div> 
                            <div class="form-group">
                                <label for="carMake" class="text-info">Car Make:</label><br>
                                <input type="text" Name="carMake" id="carMake" class="form-control"  value="<?php echo $CarMake ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="carModel" class="text-info">Car Model:</label><br>
                                <input type="text" Name="carModel" id="carModel" class="form-control"  value="<?php echo $CarModel ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="carYear" class="text-info">Car Year:</label><br>
                                <input type="number" Name="carYear" id="carYear" class="form-control"  value="<?php echo $CarYear ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="transmissionType" class="text-info">Transmission Type:</label><br>
                                <input type="text" Name="transmissionType" id="transmissionType" class="form-control"  value="<?php echo $TT ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="rate" class="text-info">Rate Per KM(₹):</label><br>
                                <input type="number" Name="rate" id="rate" class="form-control"  value="<?php echo $Rate ?>" readonly>
                            </div>
                            <div class="form-group">
                                    <label for="amount" class="text-info">Amount</label><br>
                                    <input type="number" Name="amount" id="amount" class="form-control" value="<?php echo $sum ?>" readonly >
                                </div>
                            <div class="form-group">
                                <input type="submit" name="book" class="btn btn-info btn-md" value="Book">
                            </div>
                        </form>

                            
                            
                    </div>
                </div>
            </div>
        </div>
<a href="view.php" class="text-info">Back</a> <br>
<?php require_once('includes/footer.php');?>