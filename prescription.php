<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>Voice Prescription</title>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery-3.2.1.js"></script>
	<script type='text/javascript'>
               
              
		var recognition = new webkitSpeechRecognition();
                var id1;
		recognition.onresult = function(event) { 
			console.log('result');
                       
		  	var saidText = "";
                        
		  	for (var i = event.resultIndex; i < event.results.length; i++) {
		        if (event.results[i].isFinal) {
		            saidText = event.results[i][0].transcript;
		        } else {
		            saidText += event.results[i][0].transcript;
		        }
		    }
		 	
		    document.getElementById('speechText').value = saidText;
                    document.getElementById('id').value = id1;
		   	
		   	// Search Medicines
		   	searchMediciens(saidText);
		}

		function startRecording(){
			recognition.start();
                        document.getElementById("id").value = getParams();
                        id1 = document.getElementById("id").value;
                        
		}
		// Search Medicines
		function searchMediciens(saidText){
                        

			$.ajax({
				url: 'getMedicines.php',
				type: 'post',
				data: {speechText: saidText , id: id1},
				success: function(response){
					$('.container').empty();
					$('.container').append(response);
				}
			});
                          
		}
                
               function getParams(){
			var idx = document.URL.indexOf('?');
			var params = "";
			if (idx != -1) {
			var pairs = document.URL.substring(idx+1, document.URL.length).split('&');
			for (var i=0; i<pairs.length; i++){
      			nameVal = pairs[i].split('=');
      			params = nameVal[1]; 
   			}
		}
     			 return params;
	}

		</script>
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
body, p, input.add, select, textarea, button {
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

button, input.add, select{
  border: 0;
  outline: 0;
  font-size: 16px;
  border-radius: 320px;
  padding: 16px;
  background-color: #EBECF0;
  text-shadow: 1px 1px 0 #FFF;
}

label {
  margin-bottom: 24px;
  width: 100%;
}

input.add, select {
  margin-left: 20%;
  box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
  width: 60%;
  box-sizing: border-box;
  transition: all 0.2s ease-in-out;
  appearance: none;
  -webkit-appearance: none;
}
input:focus.add, select {
  box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #FFF;
}
input.val{
  margin-left: 0%;
  width: 70%;	
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
.center {
  margin: auto;
  width: 70%;
  padding: 10px;
}
.container {
  margin: auto;
  width: 70%;
  border: 3px solid #cb202d;
  padding: 10px;
}
</style>


</head>

<body translate="no">
  <div class="myDiv">
	<h1 style="color: #cb202d;text-align: center;"><img src="Images/mic.png" width="50" height="60">&nbsp;&nbsp;Voice Prescription</h1>
  </div>
  <div class='search_container'>
			<!-- Search box-->
                      	<br><br>
			<input type='text' class="add" id='speechText' placeholder="Search Medicine By Voice"> <input type='hidden' id='id'>&nbsp;&nbsp; 
                        <button onclick="startRecording();" ><img src="Images/mic.png" width="30" height="30"></button><br><br>

</div>		

<!-- Search Result -->
<div class="container"></div>
<br><br><br>

	<?php
                   $linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");
                   if($linking === false){
 		   die("ERROR: Could not connect. " . mysqli_connect_error());
		   }
                   $html = '';
                   $id = $_GET['id'];
	           if(true)
		   {
                        echo '<form action="print_prescription.php" method="post">
  					<input type="hidden" name="id" value='.$id.'>
  					<button class="red" type="submit">Generate Prescription</button>
				</form>';
                    }
// Close connection
		mysqli_close($linking);
 ?>

</body>

</html>
 
