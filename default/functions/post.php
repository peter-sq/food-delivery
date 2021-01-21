<?php
include "../config/config.php"; // database connection file here

// Escape user inputs for security
$featureImage = $Conn->real_escape_string($_REQUEST['image']);
$caption = $Conn->real_escape_string($_REQUEST['caption']);


 
// Attempt insert query execution
$sql = "INSERT INTO stores (logo, about) VALUES ('$featureImage',  '$caption')";
if($Conn->query($sql) === true){
    echo " post added successfully";
} else{
    
    echo "ERROR: Could not able to execute $sql. " . $Conn->error;

}
 
// Close connection
$Conn->close();
?>