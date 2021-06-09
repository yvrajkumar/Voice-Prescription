<?php

$linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");

$searchPatient = $_POST['searchPatient'];
// search query
$query = 'SELECT * FROM patients WHERE id like "%'.$searchPatient.'%"';

$result = mysqli_query($linking,$query);

$html = '';
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        
	$id = $row['id'];
        // Creating HTML structure
        $html .= '<div>';
	$html .= '<h1>Patient Id: '.$id.'</h1>';
        $html .= '<form action="prescription.php" method="get">
                       <input type="hidden" name="id" value='.$id.'>
                       <button class="red" type="submit">Create Prescription</button>
                  </form>';
        $html .= '</div>';
       
     

    }
      
}else{
    $html .= '<div >';
    $html .= '<p>No Record Found.</p>';
    $html .= '</div>';
}


echo $html;
exit;