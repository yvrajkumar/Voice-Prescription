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
        $name = $row['name'];
        $age = $row['age'];
	$gender = $row['gender'];
        $email = $row['email'];
        $phone_no = $row['phone_no'];
        
        echo '<br>';
	echo 'Patient Id: ';
	echo $id;
	echo '<br>';
	echo 'Name: ';
	echo $name;
	echo '<br>';
	echo 'Gender: ';
	echo $gender;
	echo '<br>';
	echo 'Age: ';
	echo $age;
	echo '<br>';
	echo 'Email: ';
	echo $email;
	echo '<br>';
	echo 'Phone_No: ';
	echo $phone_no;
	echo '<br>';
       
     

    }
      
}else{
    $html .= '<div >';
    $html .= '<p>No Record Found.</p>';
    $html .= '</div>';
}


echo $html;
exit;