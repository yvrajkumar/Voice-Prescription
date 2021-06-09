<?php
                   $linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");
                   if($linking === false){
 		   die("ERROR: Could not connect. " . mysqli_connect_error());
		   }
                   $id = $_POST['searchPatient'];
		   // search query
		   $query = 'SELECT * FROM patients WHERE id like "%'.$id.'%"';

		   $result = mysqli_query($linking,$query);

		   $html = '';

	           if(mysqli_num_rows($result) > 0)
		   {
			echo "<h1 style='color:white'>Patient Id: $id</h1>";
                        echo '<form action="appointment.php" method="get">
  					<input type="hidden" name="id" value='.$id.'>
					<input type="date" name="date" class="date"><br><br>
  					<button class="red" type="submit">Book Appointment</button>
				</form>';
                        
			
                   }
		   else
		   {
			echo "ERROR: Could not able to execute $query. " . mysqli_error($linking);
                   }
		
// Close connection
		mysqli_close($linking);
                ?>
