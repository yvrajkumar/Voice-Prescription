<?php

$linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");

$searchPatient = $_POST['searchPatient'];
// search query
$query = 'SELECT * FROM appointments WHERE id like "%'.$searchPatient.'%"';

$result = mysqli_query($linking,$query);

$html = '';
echo '<h2>The appointment is booked on </h2>';
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        
	$date = $row['date'];
        
       
	echo $date;
	echo '<br>';
    }
      
}else{
    $html .= '<div >';
    $html .= '<p>No Record Found.</p>';
    $html .= '</div>';
}


echo $html;
exit;