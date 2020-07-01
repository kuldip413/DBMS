<!DOCTYPE html>
<html lang="en">


 <?php
    session_start();

    if(!isset($_SESSION['thispolice_inspector']))
        header("location:police_login.php");
    
    if(!mysql_connect("localhost","test","test"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("model",mysql_connect("localhost","test","test"));
    
    if(!isset($_SESSION['thispolice_inspector'])){
        header("location:police_login.php");
    }


    $police_inspector=$_SESSION['police_inspector'];
    $fir_id = $_SESSION['fir'];

     $ps_id = $_SESSION['ps_id'];


    // $query1=mysql_query("SELECT ps_id FROM police_inspector where username='$police_inspector' ");
    // $var=mysql_fetch_assoc($query1);
    // $ps_id=$var['ps_id'];





     $query2="SELECT fir_id, fir.firstname, fir.lastname, fir.phone_area_code, fir.phone_number, fir.gender, date_of_crime, complaint_type, description from fir where fir_id='$fir_id' ";

    $result=mysql_query($query2,mysql_connect("localhost","test","test")) or die(mysql_error());  
    // -----------------------------------------------------------------------------------

    if(isset($_POST['submit']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          $fir_update = $_POST['update_case'];

          $query3=mysql_query("insert into update_fir(fir_id,fir_update) values('$fir_id','$fir_update')",mysql_connect("localhost","test","test"))or die(mysql_error()); 

        }
   }

   if(isset($_POST['submit2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           $update=$_POST['add_final_report'];
            $query4=mysql_query("insert into update_fir(fir_id,fir_update) values('$fir_id','$update')",mysql_connect("localhost","test","test"))or die(mysql_error()); 
            $query5=mysql_query("update fir set case_status='Case is closed' where fir_id='$fir_id'",mysql_connect("localhost","test","test"))or die(mysql_error()); 
           
        }
   }

    if(isset($_POST['submit3']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           $update=$_POST['add_final_report'];
            $query4=mysql_query("insert into update_fir(fir_id,fir_update) values('$fir_id','$update')",mysql_connect("localhost","test","test"))or die(mysql_error()); 
            $query5=mysql_query("update fir set case_status='Case is closed' where fir_id='$fir_id'",mysql_connect("localhost","test","test"))or die(mysql_error()); 
           
        }
   }


        // -----------------------------------------------------------------------------------

?>


<!--  -->






<head>
   <title>Update CASE Page</title>
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
  background-color: #f4511e;
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}

.button:active {
  background-color: green;
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

      <a class="navbar-brand" href="police_inspector_page.php"><b>View all FIR</b></a>

  
             <a class="navbar-brand" href="police_inspector_logout.php"><b>Logout</b></a>

  </div>


<br>
<br>
<br>
<br>


<h2>Assign this Case to the sub inspector:</h2>
<form action="assign_case.php">
    <input type="submit" value="Assign Case" />
</form>



<br>
<br>

                 
            <div style="width: 50%;float: left;height: 300px; background-color:  #f0d6d6">        
            <form method="POST">
                    <h2 class="title">Update the Case</h2>
                                   

                             <div >
                                           <textarea  name="update_case" placeholder="Give Update on the Case" rows="5" cols="50"  required></textarea>
                        <div>
                            <button  type="submit" name="submit">Update the Case</button>
                        </div>

                                               
                                        
                            </div>
                           

                                   
           </form>
           </div>


           <div style="width: 50%;padding: 50px;float: right;height: 300px; background-color:   #d6f0dc">
           <form method="POST">
                              
                            <textarea  name="add_final_report" placeholder="Give final report and close the Case" rows="5" cols="50"  required></textarea>
                        <div>
                            <button  type="submit" name="submit2">Submit Final Report</button>
                        </div>
          </form>
          </div>


  
        <div class="table100">
          <table>
            <thead>
              <tr class="table100-head">
                <th class="column2">Fir Id</th>
                <th class="column2">Complainant First Name</th>
                <th class="column2">Complainant Last Name</th>
                <th class="column2">Complainant Phone area code</th>
                <th class="column2">Complainant Phone number</th>
                <th class="column2">Complainant Gender</th>

                <th class="column2">Date of Crime</th>
                <th class="column2">Complaint type</th>
               
                <th class="column3">Description of the crime</th>
                

               
              </tr>
            </thead>
            <tbody>
               <?php
      while($rows=mysql_fetch_assoc($result)){
    ?> 

      <tr>
        <td class="column2"><?php echo $rows['fir_id']; ?></td> 
         <td class="column2"><?php echo $rows['firstname']; ?></td> 
          <td class="column2"><?php echo $rows['lastname']; ?></td> 
           <td class="column2"><?php echo $rows['phone_area_code']; ?></td> 
            <td class="column2"><?php echo $rows['phone_number']; ?></td> 
             <td class="column2"><?php echo $rows['gender']; ?></td>  
        <td class="column2"><?php echo $rows['date_of_crime']; ?></td> 
        <td class="column2"><?php echo $rows['complaint_type']; ?></td> 
       
        <td class="column3"><?php echo $rows['description']; ?></td> 
       

      </tr>
    
    <?php
    } 
    ?>

                
            </tbody>
          </table>
       


  

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