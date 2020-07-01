<!DOCTYPE html>
<html lang="en">

<head>

<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


if(isset($_POST['login_admin']))
{   
    session_start();
    $_SESSION['admin']=1;

    include 'include.php';
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $admin=$_POST['admin_username'];
        $password=$_POST['admin_password'];
        $query1=mysql_query("SELECT admin_username,admin_password from admin where admin_username='$admin' and admin_password='$password' ");
        
        if(mysql_num_rows($query1)==0){
             echo "<script type='text/javascript'>alert('You are not admin');</script>";
        }
        else {
          header("location:admin_page.php");
        }
    }                
}
?> 


    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Administrator login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>


<style>

.topnav {
   overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
    z-index:999
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

</style>>

<body>

<div class="topnav">
   <a class="navbar-brand" href="index.php"><b>Home</b></a>
</div>


    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Admin login</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col">
                                <div class="input-group">
                                    <label class="label">Admin User Name</label>
                                    <input class="input--style-4" type="text" name="admin_username">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col">
                                <div class="input-group">
                                    <label class="label">Admin Password</label>
                                    <input class="input--style-4" type="password" name="admin_password">
                                </div>
                            </div>
                        </div>
			
		
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="login_admin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
