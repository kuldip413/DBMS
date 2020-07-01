<!DOCTYPE html>
<html lang="en">

<head>
    


<?php



if(isset($_POST['login_admin']))
{   
    session_start();
    $_SESSION['admin']=1;

    include 'include.php';
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $district=$_POST['district'];
        $tehsil=$_POST['tehsil'];
        $town=$_POST['town'];
        $pin=$_POST['pin'];
        $locality=$_POST['locality'];
        $psname=$_POST['police_station_name'];
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname =$_POST['lname'];
        $username=$_POST['username'];
        $password=$_POST['password'];

        // $query1=mysql_query("SELECT admin_username,admin_password from admin where admin_username='$admin' and admin_password='$password' ");

        $kk="insert into police values ('$psname','$district','$tehsil','$town','$locality','$pin','$fname','$mname','$lname','$username','$password') ";
        mysql_select_db("model");
        $query1=mysql_query($kk,mysql_connect("localhost","test","test"));

        if(!$query1){
            echo "<script type='text/javascript'>alert('User is already registered');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('User registered Successfully');</script>";
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
    <title>Admin login</title>

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
                    <h2 class="title">Add Police station</h2>
                    <form method="POST">
                        <div class="row row-space">
                           <div class="col-2">
                                <div class="input-group">
                                    <label class="label">District</label>
                                    <input class="input--style-4" type="text" name="district">
                                </div>
                            </div>
                    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tahsil</label>
                                    <input class="input--style-4" type="text" name="tehsil">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">pin code</label>
                                    <input class="input--style-4" type="text" name="pin">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">locality</label>
                                    <input class="input--style-4" type="text" name="locality">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col">
                                <div class="input-group">
                                    <label class="label">Police station Name</label>
                                    <input class="input--style-4" type="text" name="police_station_name">
                                </div>
                            </div>
                        </div>
                        <h3 class="title">Police Inspector detail</h3>

                        <div class="row row-space">
                           <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First Name</label>
                                    <input class="input--style-4" type="text" name="fname">
                                </div>
                            </div>
                    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Middle Name</label>
                                    <input class="input--style-4" type="text" name="mname">
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Last Name</label>
                                        <input class="input--style-4" type="text" name="lname">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Phone Number</label>
                                        <input class="input--style-4" type="text" name="pnumber">
                                    </div>
                                </div>
                             </div>
                             <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Username</label>
                                        <input class="input--style-4" type="text" name="username">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <input class="input--style-4" type="text" name="password">
                                    </div>
                                </div>
                             </div>

			
		
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="login_admin">Add</button>
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
