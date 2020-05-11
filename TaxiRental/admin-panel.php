<?php
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_SESSION['admin'])){
        $query="select *from taxis";
        $result=mysqli_query($con,$query);
    }
    else{
        header("location:admin-login.php");
    }
    
    
?>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h3 class=" display-4 text-center text-info">Taxi Available</h3>
        </div>
    </div>
    <a href="add.php" class="btn btn-success btn-lg m-3">Add a Taxi</a>
    <table class="table table-bordered table-dark">
    <thead>
        <tr>

        <th scope="col">Car Make</th>
        <th scope="col">Car Model</th>
        <th scope="col">Car Year</th>
        <th scope="col">Transmission Type</th>
        <th scope="col">Rate Per Km(₹)</th>
        <th scope="col" colspan="6"></th>
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
            
            <td><a href="admin-edit.php?edit=<?php echo $TaxiID?>" class="btn btn-primary btn-sm">Edit</a></td>
            <td><a href="delete.php?delete=<?php echo $TaxiID?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
    
</div>
<?php require_once('includes/footer.php');?>