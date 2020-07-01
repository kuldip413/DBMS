<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost","test","test");
  mysql_select_db("model");
  $sql = "SELECT image FROM criminal where criminal_rating=100";
  $result = mysql_query("$sql") or die(mysql_error());
  $row = mysql_fetch_assoc($result);

  echo $row['image'];
?>
