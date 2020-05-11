<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Taxi Rental System in PHP</title>
</head>
<body style="background:#CCC">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
        <img src="/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Taxi Rental Application
        </a>
      
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?php 
                
                if(isset($_SESSION['admin'])){
                    echo '<a class="nav-link" href="admin-panel.php">Panel</a>';
                }
            
            
            ?>  
        </li>
        <li class="nav-item">
            <?php 
                
                if(isset($_SESSION['admin'])){
                    echo '<a class="nav-link" href="admin-show-bookings.php">Bookings</a>';
                }
            
            
            ?>  
        </li>
        <li class="nav-item">
            <?php 
                
                if(isset($_SESSION['admin'])){
                    echo '<a class="nav-link" href="users.php">Users</a>';
                }
            
            
            ?>  
        </li>
        
        <li class="nav-item">
            <?php 
                
                if(isset($_SESSION['User ID'])||isset($_SESSION['admin'])){
                    echo '<form action="logout.php" method="POST">
                    <button class="btn btn-link"  name="logout">Logout</button>
                    </form>';
                }
                else{
                    echo '<a class="nav-link" href="login.php">Login</a>';
                }
            
            
            ?>
            
            
        </li>
        

        </ul>
    </div>
    </nav>