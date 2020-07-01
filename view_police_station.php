<!DOCTYPE html>
<html lang="en">


 <?php
    session_start();
    
    if(!mysql_connect("localhost","test","test"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("model",mysql_connect("localhost","test","test"));
    


    $query="select ps_id, police_station from police_station order by ps_id";
    $result=mysql_query($query,mysql_connect("localhost","test","test")) or die(mysql_error());  





?>
<head>
   <title>Police Stations</title>
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
            <a class="navbar-brand" href="view_pending_cases.php"><b>View Pending Cases</b></a>

      <a class="navbar-brand" href="view_completed_cases.php"><b>View Completed Cases</b></a>


       <a class="navbar-brand" href="add_police_inspector.php"><b>Add Police Inspector</b></a>

       <a class="navbar-brand" href="view_police_inspector.php"><b>View Police Inspectors</b></a>

      <a class="navbar-brand" href="add_sub_inspector.php"><b>Add Sub Inspector</b></a>


      <a class="navbar-brand" href="add_police_station.php"><b>Add Police Station</b></a>

      <a class="navbar-brand" href="view_police_station.php"><b>View Police Stations</b></a>


  <div class="nav navbar-nav navbar-right">
      <a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div> </div>

<br>


<div>
        

  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
          <table>
            <thead>
              <tr class="table100-head">
                <th class="column2">Ps id</th>
                <th class="column1">Police Station Name</th>
<!--                 <th class="column1">Police Inspector Name</th>
 -->               



               
              </tr>
            </thead>
            <tbody>
               <?php
      while($rows=mysql_fetch_assoc($result)){
    ?> 

      <tr>
        <td ><?php echo $rows['ps_id']; ?></td>  
        <td><?php echo $rows['police_station']; ?></td> 
<!--         <td><?php echo $rows['inspector_name']; ?></td> 
 -->

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