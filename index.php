<?php
 require_once 'php/config.php';
 require_once 'php/utils.php';
  
 $connection = connect_to_db($db_hostname, $db_username, $db_password, $db_database);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Image collection</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1>A carefully curated collection of searchable images</h1>
        </div>

        <div class ="flex-container">


        <div class="searcharea">
            <fieldset>
                <legend>Search</legend>
                <form action='' method="post">
                    <input type="text" id="searchcriteria" name="searchcriteria" required>
                    <input type="submit" id="searchsubmit" name="searchsubmit" value="search collection">
                </form>
            </fieldset>
        </div>

        <div class="coloursearcharea">
            <fieldset>
                <legend>Search by Colour</legend>
                <form action='' method="post">
                    <!-- <input type="text" id="colour" name="colour" required>  -->
                    <!-- will change to dropdown filled by DB -->
                    <select class="selectOption" name ="colour">

                    <?php
                        $query = 'SELECT distinct colourname from colours;';
                        fillOptionList($connection, $query);
                    ?>

                    </select>
                    <input type="submit" id="coloursubmit" name="coloursubmit" value="search by colour">
                </form>
            </fieldset>
        </div>

        <div class="moodearcharea">
            <fieldset>
                <legend>Search by Mood</legend>
                <form action='' method="post">
                    <!-- <input type="text" id="mood" name="mood" required>  -->
                    <!-- will change to dropdown filled by DB -->
                    
                    <select class="selectOption" name ="mood">
                    <?php
                        $query = 'SELECT distinct moodname from moods;'; //CHANGE THIS QUERY ONCE MOOD IS IMPLEMENTED!!
                        filloptionlist($connection, $query);
                    ?>
                    </select>
                    <input type="submit" id="moodsubmit" name="moodsubmit" value="search by mood">
                </form>
            </fieldset>
        </div>

        <div class="RandomArea">
            <fieldset>
                <legend>Surprise Me</legend>
                <form action='' method="post">
                    <input type="submit" id="randomsubmit" name="randomsubmit" value="discover">
                    <!-- maybe add options for randomness, how many images etc. -->
                </form>
            </fieldset>
        </div>

</div>

        <br>        

<?php
//Display search results
if (isset($_POST['randomsubmit'])){ //display random image
    echo '<div class=singleimg>';
    surpriseMe($connection);
    echo '</div>';
}
else {
if (isset($_POST['searchsubmit']) && $_POST['searchcriteria'] !='' ) { //general search
    $searchterm = strtolower($_POST['searchcriteria']).'%';
    $query = 'SELECT i.imagePath, i.imageName FROM images i join tags t on i.idimage = t.idimage WHERE t.tag like ?;';   
}
else if (isset($_POST['coloursubmit']) && $_POST['colour'] !='' ) { //search by colour
    $searchterm = strtolower($_POST['colour']);
    $query = 'SELECT i.imagePath, i.imageName FROM images i join colours c on i.idimage = c.idimage WHERE c.colourname = ?;';
    
}
else if (isset($_POST['moodsubmit']) && $_POST['mood'] !='' ) { //search by mood
    $searchterm = strtolower($_POST['mood']);
    $query = 'SELECT i.imagePath, i.imageName FROM images i join moods m on i.idimage = m.idimage WHERE m.moodname = ?;';
   
}
else {
    //display something when site initally loaded!
    $query = "SELECT i.imagePath, i.imageName FROM images i LIMIT ?;";
    $searchterm = '9';
}
    
    echo allSearch2($searchterm, $connection, $query);
    
}  
?>




    </body>
</html>
