<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

  $Conn = mysqli_connect("localhost", "root", "", "u555060984_relishapp");
 
	
	if($Conn){
    
  }
		else{ ?>
			<script>alert("Database Connection Error");</script>
		<?php
		}
?>



