<?php
//connects to database via object-oriented sqli. Returns connection.
function connect_to_db($db_hostname, $db_username, $db_password, $db_database)
{
	$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
	if (!$connection) {
		die($connection->error);
	}
	else {
		return $connection;
	}
}



//Displays search results
//So far, just images vertically centered. Would be nice as grid?
function allSearch($searchterm, $connection, $query){
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $searchterm);

    $stmt->execute();
    $result=$stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        
        echo'<img src='.$row['imagePath'].' alt='.$row['imageName'].'>'; //change this to displaying all images in a nice way
        echo'<br>';
        echo '<div class="caption">'.$row['imageName'].'</div>';
        echo'<br><br>';
    }
    echo '</div>';
}

//fill out optionlist with results of a query. allows the search for only existing colours and moods
function fillOptionList($connection, $query){
    $result = $connection->query($query);

   // echo '<select name="colourNames">';

    while ($row = $result->fetch_row()){
        echo $row[0];
        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
    }

  //  echo '</select>';
}

//returns and displays a random image from the collection
function surpriseMe($connection){
    $result = $connection->query('select max(idimage) from images;');
    $row = $result->fetch_row();
    $maxval = $row[0]; //gets upper bound for random image selection

    $imageid = rand(1, $maxval); //get random imageid in available range
   // echo $imageid;

    $query = "Select imagePath, imageName from images where idimage='$imageid';";
   // echo $query;
    $result = $connection->query($query);
   // echo var_dump($result);
    $row = $result->fetch_assoc();
    
    echo'<img src='.$row['imagePath'].' alt='.$row['imageName'].'>'; //change this to displaying all images in a nice way
    echo'<br>';
    echo '<div class="caption">'.$row['imageName'].'</div>';
    

}

//testmaking a grid of images!
function allSearch2($searchterm, $connection, $query){
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $searchterm);

    $stmt->execute();
    $result=$stmt->get_result();

    $html='';
    while ($row = $result->fetch_assoc()) {
        
        $html.='<div class="galleryitem"><div class="content"><img src='.$row['imagePath'].' alt='.$row['imageName'].'>'; //change this to displaying all images in a nice way
       // $html.='<br>';
        $html.='<div class="caption">'.$row['imageName'].'</div>';
       $html.='</div></div>';
        
    }
    return $html;
    
}
?>