<!DOCTYPE html>
<html lang="en">


 <?php
    session_start();
    
    if(!mysql_connect("localhost","test","test"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("model",mysql_connect("localhost","test","test"));
    
    if(!isset($_SESSION['thisuser'])){
        header("location:user_login.php");
    }

    $user=$_SESSION['user'];


    $query1=mysql_query("SELECT email FROM user where username='$user' ");
    $var=mysql_fetch_assoc($query1);
    $email=$var['email'];



    $query="select fir_id, date_of_crime, complaint_type, district, tehsil, town, locality, street, house_number, pin_code, description from fir where email='$email' order by fir_id";
    $result=mysql_query($query,mysql_connect("localhost","test","test")) or die(mysql_error());  



    $query2 = "SELECT police_station.police_station, police_inspector.inspector_name, police_inspector.inspector_contact from police_station inner join fir on fir.district=police_station.district and fir.tehsil=police_station.tehsil and fir.town= police_station.town and fir.locality= police_station.locality inner join police_inspector on police_station.ps_id=police_inspector.ps_id where email='$email' ";


    $result2=mysql_query($query2,mysql_connect("localhost","test","test")) or die(mysql_error());  



     if(isset($_POST['submit']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           $fir_id=$_POST['fir'];
           $_SESSION['fir']=$fir_id;


           $query3=mysql_query("SELECT user.username from user inner join fir on user.email=fir.email where fir_id='$fir_id' ",mysql_connect("localhost","test","test")) or die(mysql_error());


           $var = mysql_fetch_assoc($query3);
          
           if($var['username']==$_SESSION['user']){
               header("location:user_case_details.php");
           }
            else{
               $message = "This is not your Case";
              echo "<script type='text/javascript'>alert('$message');</script>";
           }
        }
   }



?>
<head>
   <title>Your Previous Complaints</title>
  <meta charset="UTF-8">
  <meta name="viewport">
<!--===============================================================================================-->  
  
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor2/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor2/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor2/select2/select2.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css2/util.css">
  <link rel="stylesheet" type="text/css" href="css2/main.css">
<!--===============================================================================================-->



</head>
<style>




html,body{height: 100%;}
body{width: 100%;
  
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px red;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

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
  background-color: black;
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
    top: 70%;
  left : 45%;
}

.button:hover {background-color: green}

.button:active {
  background-color: black;
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
    color: white;
    z-index: 5000000;

    background: black; /*sets the background of this element (here a solid colour)*/
  /*sets a transition (for hover effect)*/
  padding-left: 10px; /*sets 'padding'*/
  padding-right: 10px; /*sets 'padding'*/
  line-height: 100px; /*for this, it sets vertical alignment*/
  
}

.wrapper {
    text-align: center;
}



input[type=text] {
  width: 10%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
}



</style>

<body>

<div class="topnav">
   <a class="navbar-brand" href="index.php"><b>Home</b></a>
            <a class="navbar-brand" href="add_fir.php"><b>Add Complaint</b></a>

             <a class="navbar-brand" href="user_logout.php"><b>Logout</b></a>

  </div>


<br>


<div>
        

<form class="example" method="post" style="margin-top: 50px;;max-width:400px">
  <input type="text" name="fir" placeholder="See Details and Updates on FIR id.." required>
  <button type="submit" name="submit"><i class="fa fa-search"></i></button>
</form>


  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
          <table>
            <thead>
              <tr class="table100-head">
                <th class="column1">Fir Id</th>
                <th class="column2">Date of Crime</th>
                <th class="column2">Complaint type</th>
                <th class="column2">District</th>
                <th class="column2">Tehsil</th>
                <th class="column2">Town</th>
                <th class="column2">Locality</th>
                <th class="column2">Street</th>
                <th class="column2">House number</th>
                <th class="column2">Pin code</th>
                <th class="column3">Description of the crime</th>
               
                



               
              </tr>
            </thead>
            <tbody>
               <?php
      while($rows=mysql_fetch_assoc($result)){
    ?> 

      <tr>
        <td ><?php echo $rows['fir_id']; ?></td>  
        <td><?php echo $rows['date_of_crime']; ?></td> 
        <td><?php echo $rows['complaint_type']; ?></td> 
        <td ><?php echo $rows['district']; ?></td>  
        <td><?php echo $rows['tehsil']; ?></td> 
        <td><?php echo $rows['town']; ?></td> 
        <td><?php echo $rows['locality']; ?></td> 
        <td><?php echo $rows['street']; ?></td> 
        <td><?php echo $rows['house_number']; ?></td> 
        <td><?php echo $rows['pin_code']; ?></td> 
        <td ><?php echo $rows['description']; ?></td> 
       
       


      </tr>
    
    <?php
    } 
    ?>

                
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  

<!--===============================================================================================-->  
  <script src="vendor2/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor2/bootstrap/js2/popper.js"></script>
  <script src="vendor2/bootstrap/js2/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor2/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="js2/main.js"></script>

</body>



</html>