<!DOCTYPE html>
<html>
<head>
	<title>Add criminal</title>
      <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registration page</title>

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
   <a class="navbar-brand" href="index.php"><b>Home</b></a>
   <a class="navbar-brand" href="user_registration.php"><b>Registration</b></a>
</div>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Register Criminal</h2>
                </div>
                <div class="card-body">
                    <form action="upload_image.php" method="post" enctype="multipart/form-data">
                        <div class="form-row m-b-55">
                            <div class="name">Criminal name:</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input type="text" name="criminal_name" placeholder="Name" required>
                                            <!-- <label class="label--desc">Name</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Criminal Identification:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="criminal_identification" placeholder="Birthmark" required>
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">Criminal rating on scale of 1 to 100:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="criminal_rating" placeholder="Criminal rating" required>
                                </div>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="name">Criminal Image</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="file" name="image"/>
                                </div>
                            </div>
                        </div>  
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" name="submit" value="UPLOAD">Submit</button>
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

