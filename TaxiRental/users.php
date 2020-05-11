<?php
    require_once('includes/header.php');
    require_once('includes/connection.php');
    if(isset($_SESSION['admin'])){
        $query="select *from user_data";
        $result=mysqli_query($con,$query);
    }
    else{
        header("location:admin-login.php");
    }
    
    
?>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h3 class=" display-4 text-center text-info">Users</h3>
        </div>
    </div>
    <a href="register.php" class="btn btn-success btn-lg m-3">Add a User</a>
    <table class="table table-bordered table-dark">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Email</th>
        <th scope="col">Date of creation</th>
        <th scope="col" colspan="6"></th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($rows=mysqli_fetch_assoc($result)){

                $UserID=$rows['ID'];
                $Name=$rows['Name'];
                $DOB=$rows['DOB'];
                $Email=$rows['Email'];
                $Date=$rows['Date'];
                

        ?>
            <tr>
        
            <td><?php echo $UserID; ?></td>
            <td><?php echo $Name; ?></td>
            <td><?php echo $DOB; ?></td>
            <td><?php echo $Email; ?></td>
            <td><?php echo $Date; ?></td>
            
            <td><a href="admin-user-edit.php?uedit=<?php echo $UserID?>" class="btn btn-primary btn-sm">Edit</a></td>
            <td><a href="user-delete.php?udelete=<?php echo $UserID?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
    
</div>
<?php require_once('includes/footer.php');?>