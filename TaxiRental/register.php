<?php require_once('includes/header.php');?>


<div id="login">
        <h3 class="text-center text-white pt-5">Taxi Rental</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="registerphp.php" method="post">
                            <h3 class="text-center text-info">User Registration </h3>
                            <?php
                                $Message="";
                                if(isset($_GET['Empty'])){
                                    $Message="Please fill in the blanks";
                                    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
                                }
                                if(isset($_GET['characters'])){
                                    $Message="Please enter valid characters";
                                    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
                                }
                                if(isset($_GET['validemail'])){
                                    $Message="Please enter valid Email";
                                    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
                                }
                                if(isset($_GET['emailtaken'])){
                                    $Message="Email already taken";
                                    echo '<div class="alert alert-danger text-center">'.$Message.'
                                        
                                    </div>';
                                }
                                if(isset($_GET['success'])){
                                    if(isset($_SESSION['admin'])){
                                        $Message="Account Created";
                                        echo '<div class="alert alert-success text-center">'.$Message.'</div>';
                                    }
                                    else{
                                        $Message="Account Created";
                                        echo '<div class="alert alert-success text-center">'.$Message.'
                                        <a href="login.php"> Login Now </a>
                                        </div>';
                                    }
                                    
                                }
                            ?>
                            
                            <div class="form-group">
                                <label for="Name" class="text-info">Name:</label><br>
                                <input type="text" Name="Name" id="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="DOB" class="text-info">DOB: DD/MM/YYYY</label><br>
                                <input type="text" name="DOB" id="DOB" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Email" class="text-info">E-mail:</label><br>
                                <input type="text" name="Email" id="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Password" class="text-info">Password:</label><br>
                                <input type="password" name="Password" id="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="register" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once('includes/footer.php');?>
