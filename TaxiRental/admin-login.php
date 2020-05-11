<?php require_once('includes/header.php');?>


<div id="login">
        <h3 class="text-center text-white pt-5">Taxi Rental</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="adminphp.php" method="post">
                            <h3 class="text-center text-info">Admin Login</h3>
                            <?php
                                if(isset($_SESSION['admin'])){
                                    header("location:admin-panel.php");
                                }
                                $Message="";
                                if(isset($_GET['Empty'])){
                                    $Message="Please fill in the blanks";
                                    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
                                }
                                if(isset($_GET['invalid'])){
                                    $Message="Enter Correct Details";
                                    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
                                }
                                
                                
                            ?>
                            <div class="form-group">
                                <label for="email" class="text-info">E-mail:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info btn-md" value="submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php require_once('includes/footer.php');?>
