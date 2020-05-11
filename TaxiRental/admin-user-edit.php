<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_GET['uedit'])&&isset($_SESSION['admin'])){
        $Get_ID=$_GET['uedit'];
        $query="select *from user_data where ID='".$Get_ID."'";
        $result=mysqli_query($con,$query);
        while($rows=mysqli_fetch_assoc($result)){

            $UserID=$rows['ID'];
            $Name=$rows['Name'];
            $DOB=$rows['DOB'];
            $Email=$rows['Email'];
            $Date=$rows['Date'];
        }
    }
    else{
        header("location:users.php");
    }
    
?>
<h3 class="text-center text-white pt-5">Taxi Rental</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="userupdate.php?user_ID=<?php echo $UserID?>" method="post">
                            <h3 class="text-center text-info">User Edit </h3> 
                            <div class="form-group">
                                <label for="name" class="text-info">Name:</label><br>
                                <input type="text" Name="name" id="name" class="form-control"  value="<?php echo $Name ?>">
                            </div>
                            <div class="form-group">
                                <label for="dob" class="text-info">Date of Birth:</label><br>
                                <input type="text" Name="dob" id="dob" class="form-control"  value="<?php echo $DOB ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" Name="email" id="email" class="form-control"  value="<?php echo $Email?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-info btn-md" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<a href="users.php" class="text-info">Back</a> <br>
<?php require_once('includes/footer.php');?>