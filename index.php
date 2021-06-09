<?php
                   $linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");
                   if($linking === false){
 		   die("ERROR: Could not connect. " . mysqli_connect_error());
		   }

		
// Close connection
		mysqli_close($linking);
                ?>