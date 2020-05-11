<?php
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_SESSION['admin'])){
        $query="select *from bookings";
        $result=mysqli_query($con,$query);
    }
    else{
        header("location:admin-login.php");
    }
    
    
?>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h3 class=" display-4 text-center text-info">Bookings</h3>
        </div>
    </div>
    <table class="table table-bordered table-dark">
    <thead>
        <tr>

        <th scope="col">ID</th>
        <th scope="col">User Email</th>
        <th scope="col">Car Make</th>
        <th scope="col">Car Model</th>
        <th scope="col">Amount</th>
        <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($rows=mysqli_fetch_assoc($result)){

                $BID=$rows['BookingID'];
                $UserEmail=$rows['User_Email'];
                $CarMake=$rows['Car_Make'];
                $CarModel=$rows['Car_Model'];
                $Amount=$rows['Amount'];
                $Date=$rows['Date'];

        ?>
            <tr>
            <td><?php echo $BID; ?></td>    
            <td><?php echo $UserEmail; ?></td>
            <td><?php echo $CarMake; ?></td>
            <td><?php echo $CarModel; ?></td>
            <td><?php echo $Amount; ?></td>
            <td><?php echo $Date; ?></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
    
</div>
<?php require_once('includes/footer.php');?>