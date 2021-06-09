
<?php
$linking = mysqli_connect("127.0.0.1", "root", "", "VoicePrescription");
 
// Check connection
if($linking === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$id = $_POST['id'];
$title = $_POST['title'];

$query = 'SELECT content FROM medicines_details WHERE title like "%'.$title.'%" ';
$result = mysqli_query($linking,$query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        
         $content = $row['content'];
}
}


$link = $_POST['link'];
$dosage = $_POST['dosage'];
$count = $_POST['count'];
$morning = $_POST['morning'];
$afternoon = $_POST['afternoon'];
$night = $_POST['night'];
$food = $_POST['food'];

$sql = "INSERT INTO medicines_selected(id, title, content, link, dosage, count, morning, afternoon, night, food) VALUES ('$id', '$title', '$content', '$link', '$dosage', '$count', '$morning', '$afternoon', '$night', '$food')";

if(mysqli_query($linking, $sql)){
    header("Location: prescription.php?id=".$id);

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($linking);
?>