<?php

$linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");

$id = $_POST['searchPatient'];
// search query
$query = 'SELECT title,content,link FROM medicines_selected WHERE id like "%'.$id.'%"';

$result = mysqli_query($linking,$query);

$html = '';
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        
	$title = $row['title'];
        $content = $row['content'];
        $link = $row['link'];
        
        echo '<br>';
	echo 'Title: ';
	echo $title;
	echo '<br>';
	echo 'Content: ';
	echo $content;
	echo '<br>';
	echo 'Link: ';
	echo $link;
	echo '<br>';
	echo '------------------------------------------------------------------';
       
     

    }
      
}else{
    $html .= '<div >';
    $html .= '<p>No Record Found.</p>';
    $html .= '</div>';
}


echo $html;
exit;