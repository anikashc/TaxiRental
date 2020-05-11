<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_SESSION['User ID'])){
        $query="select *from taxis";
        $result=mysqli_query($con,$query);
        $Get_UID=$_SESSION['User ID'];
        $query1="select *from user_data where ID='".$Get_UID."'";
        $result1=mysqli_query($con,$query1);
        while($rows1=mysqli_fetch_assoc($result1)){
            $Name=$rows1['Name'];
        }
    }
    else{
        header("location:login.php");
    }
?>

<div class="container">
    <div class="col-md-6">
        <h7 class="text-info">Hello <?php echo $Name; ?></h7>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h3 class=" display-4 text-center text-info">Taxi Available</h3>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <?php
                                $Message="";
                                if(isset($_GET['Empty'])){
                                    $Message="Please fill in the Distance for Amount";
                                    echo '<div class="alert alert-danger">'.$Message.'</div>';
                                }
                                if(isset($_GET['success'])){ 
                                        $Message="Successfully Booked";
                                        echo '<div class="alert alert-success ">'.$Message.'
                                        </div>';  
                                }
        ?>
    </div>
    <table class="table table-bordered table-dark">
    <thead>
        <tr>
        
        <th scope="col">Car Make</th>
        <th scope="col">Car Model</th>
        <th scope="col">Car Year</th>
        <th scope="col">Transmission Type</th>
        <th scope="col">Rate Per Km(₹)</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($rows=mysqli_fetch_assoc($result)){

                $TaxiID=$rows['ID'];
                $CarMake=$rows['Car_Make'];
                $CarModel=$rows['Car_Model'];
                $CarYear=$rows['Car_Year'];
                $TT=$rows['Transmission_Type'];
                $Rate=$rows['Rate_Per_KM'];

        ?>
            <tr>
            
            <td><?php echo $CarMake; ?></td>
            <td><?php echo $CarModel; ?></td>
            <td><?php echo $CarYear; ?></td>
            <td><?php echo $TT; ?></td>
            <td><?php echo $Rate; ?></td>
            <td><a href="booking.php?id=<?php echo $TaxiID?>" name="book" class="btn btn-primary btn-sm">Book</a></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</div>


<?php require_once('includes/footer.php');?>