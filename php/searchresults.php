<?php
 require_once 'config.php';
 require_once 'utils.php';

 $connection = connect_to_db($db_hostname, $db_username, $db_password, $db_database);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Image collection</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale 1">
        <link rel="stylesheet" href="../styles.css">
    </head>

    <body>
<?php
//General search results

if (isset($_POST['searchsubmit'])) {
    $searchterm = strtolower($_POST['searchcriteria']).'%'; //get search term lower case

    //general search queries tags
    $stmt = $connection->prepare('SELECT i.imagePath, i.imageName FROM images i join tags t on i.idimage = t.idimage WHERE t.tag like ?;');
    $stmt->bind_param('s', $searchterm);

    $stmt->execute();
    $result=$stmt->get_result();

    echo'<div class="SearchResults">';

    while ($row = $result->fetch_assoc()) {
        
        echo'<img src=..'.$row['imagePath'].' alt='.$row['imageName'].'>'; //change this to displaying all images in a nice way
        echo'<br>';
        echo '<div class="caption">'.$row['imageName'].'</div>';
        echo'<br><br>';
    }

    echo '</div>';
}


//Colour search results
?>


<footer>
    <a href="index.html">Back</a>
</footer>
</body>
</html>