<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_SESSION['admin'])){  
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
                        <form id="login-form" class="form" action="addphp.php" method="post">
                            <h3 class="text-center text-info">Add Taxi </h3> 
                            <?php
                                $Message="";
                                if(isset($_GET['success'])){
                                    $Message="Taxi Added";
                                    echo '<div class="alert alert-success text-center">'.$Message.'</div>';
                                }
                            ?>
                            <div class="form-group">
                                <label for="carMake" class="text-info">Car Make:</label><br>
                                <input type="text" Name="carMake" id="carMake" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label for="carModel" class="text-info">Car Model:</label><br>
                                <input type="text" Name="carModel" id="carModel" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="carYear" class="text-info">Car Year:</label><br>
                                <input type="number" Name="carYear" id="carYear" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label for="transmissionType" class="text-info">Transmission Type:</label><br>
                                <input type="text" Name="transmissionType" id="transmissionType" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label for="rate" class="text-info">Rate Per KM(₹):</label><br>
                                <input type="number" Name="rate" id="rate" class="form-control"  >
                            </div>
                                <div class="form-group">
                                    <input type="submit" name="add" class="btn btn-info btn-md" value="Add">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<a href="admin-panel.php" class="text-info">Back</a> <br>
<?php require_once('includes/footer.php');?>