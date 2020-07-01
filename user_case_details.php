<!DOCTYPE html>
<html lang="en">


 <?php
    session_start();

    if(!isset($_SESSION['thisuser']))
        header("location:user_login.php");
    
    if(!mysql_connect("localhost","test","test"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("model",mysql_connect("localhost","test","test"));
    
   

    $fir_id = $_SESSION['fir'];


    $query1=mysql_query("SELECT sub_id FROM fir where fir_id= '$fir_id' ");
     $var=mysql_fetch_assoc($query1);
     $sub_id=$var['sub_id'];





     $query2="SELECT fir_id, fir.firstname, fir.lastname, fir.phone_area_code, fir.phone_number, fir.gender, date_of_crime, complaint_type, description, case_status from fir where fir_id='$fir_id' ";

    $result=mysql_query($query2,mysql_connect("localhost","test","test")) or die(mysql_error());  


    $result2=mysql_query("select fir_update, date_of_update from update_fir where fir_id='$fir_id'",mysql_connect("localhost","test","test"));


     $query3 = "SELECT police_station.police_station, police_inspector.inspector_name, police_inspector.inspector_contact from police_station inner join fir on fir.district=police_station.district and fir.tehsil=police_station.tehsil and fir.town= police_station.town and fir.locality= police_station.locality inner join police_inspector on police_station.ps_id=police_inspector.ps_id where fir_id='$fir_id' ";


    $result3=mysql_query($query3,mysql_connect("localhost","test","test")) or die(mysql_error());  

     $query4 = "SELECT sub_inspector_name, sub_inspector_contact from sub_inspector where sub_id = '$sub_id' ";

    $result4=mysql_query($query4,mysql_connect("localhost","test","test")) or die(mysql_error());  

     $rows=mysql_fetch_assoc($result);
    $rows2=mysql_fetch_assoc($result3);

    $rows3 = mysql_fetch_assoc($result4);

    // -----------------------------------------------------------------------------------

         // -----------------------------------------------------------------------------------

?>


<!--  -->






<head>
   <title>User Case details</title>
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







</style>

<body>

<div class="topnav">
   <a class="navbar-brand" href="index.php"><b>Home</b></a>
            <a class="navbar-brand" href="add_fir.php"><b>Add Complaint</b></a>

             <a class="navbar-brand" href="user_logout.php"><b>Logout</b></a>

  </div>

<br>
<br>
<br>
<br>
<br>
    
           

 
  
        <div class="table100">
          <table>
            <thead>
              <tr class="table100-head">
                <th class="column2">Fir Id</th>
               
                <th class="column2">Date of Crime</th>
                <th class="column2">Complaint type</th>
               
                <th class="column2">Description of the crime</th>
                 <th class="column2">Police Inspector name</th>
                <th class="column2">Police Inspector Contact</th>
                <th class="column2">Police Station Name</th>
                <th class="column2">Assigned to sub inspector</th>
                <th class="column2">Sub Inspector Contact</th>
                <th class="column2">Case Status</th>
                

               
              </tr>
            </thead>
            <tbody>
              

      <tr>
        <td class="column2"><?php echo $rows['fir_id']; ?></td> 
         
        <td class="column2"><?php echo $rows['date_of_crime']; ?></td> 
        <td class="column2"><?php echo $rows['complaint_type']; ?></td> 
       
        <td class="column2"><?php echo $rows['description']; ?></td> 

        <td><?php echo $rows2['inspector_name']; ?></td> 
        <td><?php echo $rows2['inspector_contact']; ?></td> 
        <td><?php echo $rows2['police_station']; ?></td> 
        <td><?php echo $rows3['sub_inspector_name']; ?></td> 
        <td><?php echo $rows3['sub_inspector_contact']; ?></td> 
        <td><?php echo $rows['case_status']; ?></td> 

      </tr>
   

                
            </tbody>
          </table>

          </div>

<br>
<br>
<br>
<br>
<br>
    


        <div class="table100">
          <table>
            <thead>
              <tr class="table100-head">
                <th class="column2">Case updation</th>
                <th class="column2">Time of update</th>
                
               
              </tr>
            </thead>
            <tbody>
               <?php
      while($rows=mysql_fetch_assoc($result2)){
    ?> 

      <tr>
        <td class="column2"><?php echo $rows['fir_update']; ?></td> 
         <td class="column2"><?php echo $rows['date_of_update']; ?></td> 
      
      </tr>
    
    <?php
    } 
    ?>

                
            </tbody>
          </table>

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