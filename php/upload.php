<?php
require_once 'config.php';
require_once 'utils.php';

$connection = connect_to_db($db_hostname, $db_username, $db_password, $db_database);
var_dump($_FILES);

var_dump($_POST);
//getting all relevant values for DB out of $_POST
$photoName = $_POST['photoName'];
$tags=$_POST['tags']; //currently as one string, split into array 
$colours=$_POST['formcolour']; //already an array
$moods=$_POST['formmood'];

//for testing remove later!!
echo'<br>';
echo $photoName;
echo'<br>';
echo $tags;
echo'<br>';
var_dump($colours);
echo'<br>';
var_dump($moods);

//creating a unique file name using timestamp.
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

//path added for DB
$imagePath= 'images/'.$newfilename;

//1st section acutal upload of file


//2nd section: update of database. UNCOMMENT WHEN READY!

//Insert into images
$query = 'INSERT into images (imageName, imagePath) values (?,?);';
$stmt = $connection->prepare($query);
$stmt->bind_param('ss', $photoName, $imagePath);
//$stmt->execute();
//$result=$stmt->get_result();

//Get id for next queries
$query ='SELECT idimage FROM images WHERE imagePath = ?;';
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $imagePath);
// $stmt->execute();
// $result=$stmt->get_result();
// $row = $result->fetch_row();
$id = $row[0]; //ID of image just added

//INSERT into Tags (required field so will always occur)
$tagarray = explode(" ", $tags);

$query = 'INSERT into tags values (?,?);';
$stmt = $connection->prepare($query);
$stmt->bind_param('ss', $id, $tag);

foreach ($tagarray as $tag) {
    
    //$stmt->execute();
    //$result=$stmt->get_result();
}

//INSERT INTO COLOURS
if ($colours){
    $query = 'INSERT into colours values (?,?);';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $id, $colour);

    foreach ($colours as $colour) {
        //$stmt->execute();
        //$result=$stmt->get_result();
    } 
}

//INSERT INTO MOODS
if ($colours){
    $query = 'INSERT into moods values (?,?);';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $id, $mood);

    foreach ($moods as $mood) {
        //$stmt->execute();
        //$result=$stmt->get_result();
    } 
}

?>