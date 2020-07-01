<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    if(!isset($_SESSION['thisuser'])){
        
        header(" location:user_login.php");
    }

    include 'include.php';
    
    $user=$_SESSION['user'];
        
    $query1=mysql_query("SELECT firstname FROM user where username='$user' ");

    $var=mysql_fetch_assoc($query1);
    $firstname=$var['firstname'];

    $query2=mysql_query("SELECT lastname FROM user where username='$user' ");
    $var=mysql_fetch_assoc($query2);
    $lastname=$var['lastname'];

    $query3=mysql_query("SELECT email FROM user where username='$user' ");
    $var=mysql_fetch_assoc($query3);
    $email=$var['email'];

    $query4=mysql_query("SELECT gender FROM user where username='$user' ");
    $var=mysql_fetch_assoc($query4);
    $gender=$var['gender'];

    $query5=mysql_query("SELECT phone_area_code FROM user where username='$user' ");
    $var=mysql_fetch_assoc($query5);
    $phone_area_code=$var['phone_area_code'];
    $query6=mysql_query("SELECT phone_number FROM user where username='$user' ");
    $var=mysql_fetch_assoc($query6);
    $phone_number=$var['phone_number'];



if(isset($_POST['submit'])){

    if(!mysql_connect("localhost","test","test"))
    {
        die('could not connect: '.mysql_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        $date_of_crime = $_POST['date_of_crime'];
        $complaint_type = $_POST['complaint_type'];
        $district = $_POST['district'];
        $tehsil = $_POST['tehsil'];
        $town = $_POST['town'];
        $locality = $_POST['locality'];
        $street = $_POST['street'];
        $house_number = $_POST['house_number'];
        $pin_code = $_POST['pin_code'];
        $description = $_POST['description'];


     $date = $date_of_crime;
     $date = str_replace('/', '-', $date);
     $date = date('Y-m-d', strtotime($date));
     $var=strtotime(date("Y-m-d"))-strtotime($date);

     $date_of_crime = $date;
        
    if($var>=0)
     {

      $query1="insert into fir(firstname, lastname, email, phone_area_code, phone_number, gender, date_of_crime, complaint_type, district, tehsil, town, locality, street, house_number, pin_code, description) values ('$firstname' ,'$lastname','$email', '$phone_area_code', '$phone_number', '$gender', '$date_of_crime', '$complaint_type', '$district', '$tehsil', '$town', '$locality', '$street', '$house_number', '$pin_code', '$description')";
      
      mysql_select_db("model"); 
      $ans=mysql_query($query1,mysql_connect("localhost","test","test")) or die(mysql_error()."insertion failed");
      
      if(!$ans){
        echo "<script type='text/javascript'>alert('insertion failed');</script>";
      }
      else{
          echo "<script type='text/javascript'>alert('Complaint Successfully registered');</script>";
     }
    }
    else{
      echo "<script type='text/javascript'>alert('not a valid date');</script>";
    }
  }
}

?>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Complaint</title>
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

            <a class="navbar-brand" href="add_fir.php"><b>Add Complaint</b></a>

      <a class="navbar-brand" href="user_previous_complaints.php"><b>Your previous Complaints</b></a>

  <div class="nav navbar-nav navbar-right">
      <a href="user_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div> </div>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Add your Complaint</h2>
                    <form method="POST">
                        <fieldset id="places">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="firstname" disabled value=<?php echo "$firstname"; ?> >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="lastname" dsabled value=<?php echo "$lastname"; ?> >
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">

                             <div class="col-2">
                            
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" disabled value=<?php echo "$email"; ?> >
                                </div>
                          
                             </div>

                           
                            <div class="col-2">
                                <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <input class="input--style-4" type="text" name="gender" disabled value=<?php echo "$gender"; ?> >
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Area Code</label>
                                    <input class="input--style-4" type="text" name="phone_area_code" disabled value=<?php echo "$phone_area_code"; ?> >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone_number" disabled value=<?php echo "$phone_number"; ?> >
                                </div>
                            </div>
                        </div>

                         <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of Crime Happened</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="date_of_crime" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        
      <!-- <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">age</label>
                                    <input class="input--style-4" type="text" name="age">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">marital status</label>
                                    <input class="input--style-4" type="text" name="marital staus">
                                </div>
                            </div>
                        </div> -->

      <div class="row row-space">

                 
           

                 <div class="col-2">
                         <label class="label">District</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="district" id="country" name="country" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>

                 </div>
                 <div class="col-2">
                            <label class="label">Tehsil</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="tehsil" required>
                                <option disabled="disabled" selected="selected">Choose option</option> 
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        
            </div>


            </div>

            </br>

            <div class="row row-space">

             

            <div class="col-2">
                            <label class="label">City/Town/Village</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="town" id="city" name="city" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                         <div class="col-2">

                            <label class="label">Locality</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="locality" id="locality" name="locality" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

            </div>
            


            </br>

      <div class="row row-space">
             <div class="col-2">
                            <div class="input-group">
                                    <label class="label">Street</label>
                                    <input class="input--style-4" type="text" name="street" placeholder="Street">
                                </div>
                        </div>


            </div>


            </br>

            <div class="row row-space">


             <div class="col-2">
                            <div class="input-group">
                                    <label class="label">House no.</label>
                                    <input class="input--style-4" type="text" name="house_number" placeholder="House no.">
                                </div>
                        </div>


             <div class="col-2">
                            <div class="input-group">
                                    <label class="label">PinCode</label>
                                    <input class="input--style-4" type="text" name="pin_code" placeholder="Pin Code" required>
                                </div>
                        </div>
            </div>



            <div class="row row-space">

                 <div class = "col-2">   

                            <label class="label">Complaint Type</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="complaint_type" required>
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Lost Child</option>
                                    <option>Theft</option>
                                    <option>Cyber Crime</option>
                                    <option>Robbery</option>
                                    <option>Burgalary</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
            </div>

            </br>
      <div class="input-group">
            <label class="label"> Description of the Crime</label>
                              
                        <textarea  name="description" placeholder="Describe the incident. 
Give as much details as possible" rows="10" cols="40"  required></textarea>
                
            </div>

                    
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

</html>
<!-- end document-->
