<?php

$linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");

$searchText = $_POST['speechText'];
$id = $_POST['id'];
// search query
$query = 'SELECT * FROM medicines_details WHERE title like "%'.$searchText.'%" or content like "%'.$searchText.'%" or link like "%'.$searchText.'%"';

$result = mysqli_query($linking,$query);

$html = '';
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        
        $title = $row['title'];
        $content = $row['content'];
        $link = $row['link'];
        
        // Creating HTML structure
        $html .= '<div id="post_'.$id.'" class="post">';
        $html .= '<h1>'.$title.'</h1>';
        $html .= '<p>'.$content.'</p>'; 
	$html .= '<a href="'.$link.'" class="more" target="_blank">View medicine details</a>';
        $html .= '<form class="right" action="add.php" method="post">
                       <input type="hidden" name="id" value='.$id.'>
                       <input type="hidden" name="title" value='.$title.'>
                       <input type="hidden" name="link" value='.$link.'>
		       <input type="text" align="center" name="dosage" placeholder="Enter Dosage" class="val">
                       <input type="number" name="count" placeholder="No. of Tablets" class="val"><br>
		       
		       <input type="checkbox" name="morning" value="Morning">
		       <label for="morning"> Morning </label>
		       <input type="checkbox" name="afternoon" value="Afternoon">
		       <label for="afternoon"> Afternoon </label>
		       <input type="checkbox" name="night" value="Night">
		       <label for="night"> Night </label><br>
		
		       <input type="radio" name="food" value="Before having food.">
		       <label for="food">Before food <label>
		       <input type="radio" name="food" value="After having food.">
		       <label for="food">After food </label><br><br>
   		       
                       <input type="submit" class="add" value="Add">
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