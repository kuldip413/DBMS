<!DOCTYPE html>
<html lang="en">

<head>

<?php
    if(isset($_POST['register'])){
    
        
         include 'include.php';
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $criminal_id=$_POST['criminal_id'];
            $criminal_rating = $_POST['criminal_rating'];
            
            $query1=mysql_query("UPDATE criminal SET criminal_rating='$criminal_rating' where criminal_id='$criminal_id' ") or die(mysql_error());
        
        
       
          header("location:police_inspector_page.php");
        
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
    <title>Update criminal rating</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/reg1.css" rel="stylesheet" media="all">
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
</style>

<body>

<div class="topnav">
   <a class="navbar-brand" href="police_inspector_page.php"><b>Back</b></a>
</div>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Update criminal rating</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                       
                        <div class="form-row">
                            <div class="name">Criminal Id</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="criminal_id" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Select new rating on a scale of 1 to 100</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="criminal_rating" required>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" name="register">Update</button>
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
    <script src="js/reg.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
