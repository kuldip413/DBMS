<!DOCTYPE html>
<html lang="en">



<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        
        header(" location:admin_login.php");
    }

    include 'include.php';
    
    $user=$_SESSION['user'];
        
    


if(isset($_POST['submit'])){

    if(!mysql_connect("localhost","test","test"))
    {
        die('could not connect: '.mysql_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        $district = $_POST['district'];
        $tehsil = $_POST['tehsil'];
        $town = $_POST['town'];
        $locality = $_POST['locality'];
        $pin_code = $_POST['pin_code'];
        $police_station = $_POST['police_station'];
        $name=$_POST['name'];
        $contact=$_POST['cn'];
        // $username=$_POST['username'];
        // $password=$_POST['password'];

    
      

    $query = "select ps_id from police_station where ( district='$district' AND tehsil='$tehsil' AND town='$town' AND locality='$locality' )";
    $result = mysql_query($query) or die(mysql_error());
    $row=mysql_fetch_array($result);
    $ps_id = $row['ps_id'];

    $query = "select police_station from police_station where ( district='$district' AND tehsil='$tehsil' AND town='$town' AND locality='$locality' )";
    $result = mysql_query($query) or die(mysql_error());
    $row=mysql_fetch_array($result);
    $value = $row['police_station'];
    $query1 = "insert into sub_inspector(ps_id, police_station,sub_inspector_name, sub_inspector_contact) values ('$ps_id', '$value','$name','$contact')";


    // $query1 = "insert into police_station values ('$district', '$tehsil', '$town', '$locality', '$pin_code', '$police_station')"; 
    
      mysql_select_db("model"); 
      $ans=mysql_query($query1,mysql_connect("localhost","test","test")) or die(mysql_error());
      
      if(!$ans){
        echo "<script type='text/javascript'>alert('$ps_id,$value,$name,$contact,$username,$password Sub Inspector Alreday added ');</script>";
      }
      else{
          echo "<script type='text/javascript'>alert('Sub Inspector Successfully added');</script>";
     }
       
  }
}

?>



<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add Police Station</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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




.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  position: absolute;
  border-radius: 15px;
  box-shadow: 0 9px #999;
    top: 60%;
    left : 45%;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

div.a {
  font-size: 50px;
}

div.b{
margin: 0;
position: absolute;
  top: 50%;
   left: 15%;
    font-size: 50px;
    font-weight: 1000;
    color: brown;
    
}

.wrapper {
    text-align: center;
}



</style>

<body>


<div class="topnav">
   <a class="navbar-brand" href="index.php"><b>Home</b></a>
            <a class="navbar-brand" href="view_pending_cases.php"><b>View Pending Cases</b></a>

      <a class="navbar-brand" href="view_completed_cases.php"><b>View Completed Cases</b></a>


       <a class="navbar-brand" href="add_police_inspector.php"><b>Add Police Inspector</b></a>

       <a class="navbar-brand" href="add_sub_inspector.php"><b>Add Sub Inspector</b></a>

      <a class="navbar-brand" href="add_police_station.php"><b>Add Police Station</b></a>


  <div class="nav navbar-nav navbar-right">
      <a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div> </div>



 


    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Add Sub inspector</h2>
                    <form method="POST">
                        <fieldset id="places">
                         <div class="row row-space">

                

                           <div class="col-2">
                                   <label class="label">District</label>
                                      <div class="rs-select2 js-select-simple select--no-search">
                                          <select name="district" required>
                                          <option disabled="disabled" selected="selected">Choose option</option>
                                           <!--   <?php
                                  $q1=mysql_query("select district from locations");
                                  while($row=mysql_fetch_array($q1))
                                  {
                                      ?>
                                              <option> <?php echo "$row[0]"; ?> </option>
                                      <?php
                                  }
                                  ?> -->
                                          </select>
                                          <div class="select-dropdown"></div>
                                      </div>

                           </div>


                  </div>

              </br>

            <div class="row row-space">

             <div class="col-2">
                            <label class="label">Tehsil</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="tehsil" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                  <!-- <?php
                        $q1=mysql_query("select tehsil from locations");
                        while($row=mysql_fetch_array($q1))
                        {
                            ?>
                                    <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>    -->
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        
            </div>

            <div class="col-2">
                            <label class="label">City/Town/Village</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="town" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                   <!-- <?php
                        $q1=mysql_query("select town from locations");
                        while($row=mysql_fetch_array($q1))
                        {
                            ?>
                                    <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?> -->
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

            </div>

            </br>

            <div class="row row-space">

                        <div class="col-2">

                            <label class="label">Locality</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="locality" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                    <!--  <?php
                        $q1=mysql_query("select locality from locations");
                        while($row=mysql_fetch_array($q1))
                        {
                            ?>
                                    <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?> -->
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

              <div class="col-2">
                            <div class="input-group">
                                    <label class="label">PinCode</label>
                                    <input class="input--style-4" type="text" name="pin_code" placeholder="Pin Code" required>
                                </div>
                        </div>

            </div>

            </br>

            
                  <div class="row row-space">

                

                           <div class="col-2">
                                    <div class="input-group">
                                    <label class="label">Full Name</label>
                                    <input class="input--style-4" type="text" name="name" placeholder="Name" required>
                                </div>

                           </div>                  

                           <div class="col-2">
                                    <div class="input-group">
                                    <label class="label">contact Number</label>
                                    <input class="input--style-4" type="text" name="cn" placeholder="Mobile number" required>
                                </div>

                           </div>
                    </div>

                 <!--  <div class="row row-space">

                

                           <div class="col-2">
                                    <div class="input-group">
                                    <label class="label">User name</label>
                                    <input class="input--style-4" type="text" name="username" placeholder="Username" required>
                                </div>

                           </div>

                           <div class="col-2">
                                    <div class="input-group">
                                    <label class="label">Password</label>
<<<<<<< HEAD
                                    <input class="input--style-4" type="Password" name="password" placeholder="Password" required>
=======
                                    <input class="input--style-4" type="Password" name="password" required>
>>>>>>> d57ab30ca8b8726ee987bf96a29a81eb7812a275
                                </div>

                           </div>
                  </div>  -->           
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                        </div>
                      </fieldset>
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

    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<script>

places=[ ['',['Kanpur Nagar', 'Gorakhpur', 'Deoria']],
['Kanpur Nagar', ['Kanpur Sadar','Ghatampur','Bilhaur']],
['Kanpur Sadar', ['Kalyanpur','Panki','Bithoor']],
['Kalyanpur',['IIT Kanpur', 'Gurudev', 'Nankari']],
['Panki', ['Tharibhar', 'Dudahi', 'Maiharwa']],
['Bithoor', ['Tulsipura', 'Bairat', 'Govindam']],
['Ghatampur', ['Khalsi', 'Panipur', 'Purna']],
['Khalsi', ['jalaun', 'jamunia', 'pehelpur']],
['Panipur', ['Dhanipur', 'Sunga', 'Kuraisi']],
['Purna', ['Lar Road', 'Bhadwal', 'Officers colony']],
['Bilhaur', ['Raghavpur', 'Durjanpur', 'Kirkdale']],
['Raghavpur', ['Sonauli', 'Regal Road', 'Brijmanganj']],
['Durjanpur', ['ullaspur', 'Tusail', 'Ullswater']],
['Kirkdale', ['Stalinganj', 'Bhojnagar', 'Bankhall']],
['Gorakhpur', ['Gorakhnath', 'Gopalganj']],
['Gorakhnath', ['Zaidpur', 'Bargadwa', 'Rampur']],
['Zaidpur', ['Brondinganj', 'Bronx Pur', 'Brojan']],
['Bargadwa', ['71st Avenue', '72nd Avenue', '73rd Avenue']],
['Rampur', ['Broadnamgar', 'bansi', 'Park Avenue']],
['Gopalganj', ['Mau', 'Bharma', 'Southi']],
['Mau', ['Itwa', 'Sadwa', 'Bankata']],
['Bharma', ['Azampur', 'Santan Ganj', 'Hollnagar']],
['Southi', ['Westward', 'Bhawal', 'magadhiya']],
['Deoria', ['Kasya','Deoria Sadar']],
['Kasya', ['Tarkulwa', 'Sabji Mandi', 'Akihabara']],
['Tarkulwa', ['Omoidan', 'Kabulpur']],
['Sabji Mandi', ['Koen', 'tesandok', 'Aoyadori']],
['Akihabara', ['tharibhar', 'Kandapur']],
['Deoria Sadar', ['Bhujauli', 'Daspur', 'New Colony']],
['Bhujauli', ['Nishini', 'shripura', 'Kimach']],
['Daspur', ['Route 4', 'Route 45']],
['New Colony', ['Route 4', 'Route 457']]
];


function addOptions(the_options, the_sel) {
    len = the_options.length;
    while (the_sel.hasChildNodes()) {
        the_sel.removeChild(the_sel.firstChild);
    }
    for (i=0; i<len; i++) {
        op = document.createElement("option");
        the_val = the_options[ i ];
        val = document.createAttribute('value');
        val.value = the_val; 
        op.setAttributeNode(val);
        the_text = document.createTextNode(the_val);
        op.appendChild(the_text);
        if (i==0) {
            op.selected=true;
        }
        the_sel.appendChild(op);
    }
}



function fillEm(no) {
    for (j=no; j<boxes_len; j++) {
        if (j==0) {
            the_options = our_array[0][1];
            addOptions(the_options, boxes[j]);
        }
        else {
            pVal = boxes[j-1].value;
            for (k = 0; k<arr_len; k++) {
                if (our_array[k][0] == pVal) {
                    the_options = our_array[k][1];
                    addOptions(the_options, boxes[j]);
                }
            }
        }
    }
}


window.onload = function() {
    boxes = document.getElementById('places').getElementsByTagName('select');
    boxes_len = boxes.length; 
    our_array = places;
    arr_len = our_array.length;
    fillEm(0);
    for (j=0; j<boxes_len-1; j++) {
        boxes[j].onchange=function() {
            for (m=0; m<boxes_len-1; m++) {
                if (this==boxes[m]) {
                    fillEm(m+1);
                }
            }
        }
    }
}
</script> 

</html>
<!-- end document-->
