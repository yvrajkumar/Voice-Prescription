<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>Voice Prescription</title>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  	
<style>
body, html {
  margin:0;
  background-color: #cb202d;
}

.myDiv {
  position: -webkit-sticky;
  position: sticky;
  background-color: white;    
  overflow:hidden;
  
}
body, p, input, select, textarea, button {
  font-family: 'Montserrat', sans-serif;
  letter-spacing: -0.2px;
  font-size: 16px;
}
div, p  {
  color: #BABECC;
  text-shadow: 1px 1px 1px #FFF;
}

form {
  padding: 16px;
  width: 320px;
  margin: 0 auto;
}

.segment {
  padding: 32px 0;
  text-align: center;
}

button, input, select{
  border: 0;
  outline: 0;
  font-size: 16px;
  border-radius: 320px;
  padding: 16px;
  background-color: #EBECF0;
  text-shadow: 1px 1px 0 #FFF;
}

label {
  display: block;
  margin-bottom: 24px;
  width: 100%;
}

input, select {
  margin-right: 8px;
  box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
  width: 100%;
  box-sizing: border-box;
  transition: all 0.2s ease-in-out;
  appearance: none;
  -webkit-appearance: none;
}
input:focus, select {
  box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #FFF;
}

button {
  color: #61677C;
  font-weight: bold;
  box-shadow: -5px -5px 10px #FFF, 5px 5px 20px #BABECC;
  transition: all 0.2s ease-in-out;
  cursor: pointer;
  font-weight: 600;
}
button:hover {
  box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
}
button:active {
  box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #FFF;
}
button .icon {
  margin-right: 8px;
}
button.unit {
  border-radius: 8px;
  line-height: 0;
  width: 48px;
  height: 48px;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 8px;
  font-size: 19.2px;
}
button.unit .icon {
  margin-right: 0;
}
button.red {
  display: block;
  width: 100%;
  color: #AE1100;
}

.input-group, select {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}
.input-group label, select {
  margin: 0;
  flex: 1;
}


</style>

</head>
<body translate="no" >
  <div class="myDiv">
	<h1 style="color: #cb202d;text-align: center;"><img src="Images/mic.png" width="50" height="60">&nbsp;&nbsp;Voice Prescription</h1>
  </div>
<?php
                   $linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");
                   if($linking === false){
 		   die("ERROR: Could not connect. " . mysqli_connect_error());
		   }
                   $html = '';
                   $name =  $_POST['Name'];
                   $age =  $_POST['Age'];
                   $gender =  $_POST['Gender'];
                   $email = $_POST['Email'];
		   $phone_no = $_POST['PhoneNo'];
                   $id=substr($name,0,(strlen($name)/2)+1).substr($phone_no,5,10);
                   $sql = "INSERT INTO patients(id,name,age,gender,email,phone_no) VALUES ('$id','$name', '$age','$gender', '$email', '$phone_no')";
	           if(mysqli_query($linking, $sql))
		   {
			echo "<h1 style='color:white'>Patient Id: $id</h1>";
                        echo '<form action="prescription.php" method="get">
  					<input type="hidden" name="id" value='.$id.'>
  					<button class="red" type="submit">Create Prescription</button>
				</form>';
                        
			
                   }
		   else
		   {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($linking);
                   }
		
// Close connection
		mysqli_close($linking);
                ?>
</body>
</html>