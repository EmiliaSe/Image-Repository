<!DOCTYPE html>
<html>

    <head>
        <title>Photo Upload</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Roboto&display=swap" rel="stylesheet">
    </head>

<body>

<?php
require_once 'include/config.php';
require_once 'include/utils.php';

$connection = connect_to_db($db_hostname, $db_username, $db_password, $db_database);
// var_dump($_FILES);
// var_dump($_POST);

if (isset($_FILES['fileToUpload'])) {
    //getting all relevant values for DB out of $_POST
    $photoName = $_POST['photoName'];
    $tags=$_POST['tags']; //currently as one string, split into array 
    $colours=$_POST['formcolour']; //already an array
    $moods=$_POST['formmood'];

    //allowed extensions
    $exts=array("jpeg", "jpg","png", "gif" );
    //array to store error messages
    $errors =array();

    //for testing remove later!!
    // echo'<br>';
    // echo $photoName;
    // echo'<br>';
    // echo $tags;
    // echo'<br>';
    // var_dump($colours);
    // echo'<br>';
    // var_dump($moods);

    //creating a unique file name using timestamp.
    $img_ext = strtolower(end(explode(".", $_FILES["fileToUpload"]["name"])));
    $newfilename = round(microtime(true)) . '.' . $img_ext;

    // echo $newfilename;

    //path added for DB
    $imagePath= 'images/'.$newfilename;

    //1st section acutal upload of file
    if(!in_array($img_ext, $exts)){
        
        $errors[] = "Allowed image types are jpeg, jpg, png and gif";
        
    }
    if($_FILES['fileToUpload']['size'] > 10485760) {
        $errors[] = "Maximum file size is 10mb";
    }
    //need more error checking?????

    if (!$errors){
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$imagePath)){
            echo '<p style="text-align:center">';
            echo "File successfully added!"; //edit it out later to give option to return to home or upload new image
            echo '<br>';
            echo '<a href="index.php">return to homepage</a>';
            echo '<br>';
            echo '<a href="addphoto.html">Upload another photo</a> </p>';
    
        }
        else {
            echo 'failure to upload file';
        }
        
    }
    else {
        echo '<p style="text-align:center"> Image upload failed';
        foreach ($errors as $e) {
            echo '<br>';
            echo $e;
            echo '<br>';
            echo 'go back and try again </p>';
        }
    }


    //2nd section: update of database. UNCOMMENT WHEN READY!

    //Insert into images
    $query = 'INSERT into images (imageName, imagePath) values (?,?);';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $photoName, $imagePath);
    $stmt->execute();
    $result=$stmt->get_result();

    //Get id for next queries
    $query ='SELECT idimage FROM images WHERE imagePath = ?;';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $imagePath);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_row();
    $id = $row[0]; //ID of image just added

    //INSERT into Tags (required field so will always occur)
    $tagarray = explode(" ", $tags);

    $query = 'INSERT into tags values (?,?);';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $id, $tag);

    foreach ($tagarray as $tag) {
        
        $stmt->execute();
        $result=$stmt->get_result();
    }

    //INSERT INTO COLOURS
    if ($colours){
        $query = 'INSERT into colours values (?,?);';
        $stmt = $connection->prepare($query);
        $stmt->bind_param('ss', $id, $colour);

        foreach ($colours as $colour) {
            $stmt->execute();
            $result=$stmt->get_result();
        } 
    }
    //INSERT INTO MOODS
    if ($colours){
        $query = 'INSERT into moods values (?,?);';
        $stmt = $connection->prepare($query);
        $stmt->bind_param('ss', $id, $mood);

        foreach ($moods as $mood) {
            $stmt->execute();
            $result=$stmt->get_result();
        } 
    }
}
?>

</body>
<html>
