<?php



if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
	$criminal_name = $_POST['criminal_name'];
	$criminal_identification = $_POST['criminal_identification'];
	$criminal_rating = $_POST['criminal_rating'];

        /*
         * Insert image data into database
         */

	if(!mysql_connect("localhost","test","test"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("model",mysql_connect("localhost","test","test"));        

  	      
        //Insert image content into database
        $insert = mysql_query("INSERT into criminal(image, criminal_name, criminal_identification, criminal_rating) VALUES ('{$imgContent}', '$criminal_name', '$criminal_identification', '$criminal_rating')") or die(mysql_error());
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>


