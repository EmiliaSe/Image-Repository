# Image repository

small project creating a searchable image repository

## features
* Using a simple web interface that allows users to view a curated collection of images
* Users can search either by keywords, colours, moods or view a random image
* images were initially sourced from unsplashed.com and some personal photos
* users can anonymously upload images via a form and specify tags, colours and moods that will be used to identify the image

## technical details
* storage is a mySQL database that stores the path to the image that is stored in the filesystem. In a larger implementation, the images could stored with some cloudservice and the DB would store the path to access the files instead of saving them on the same web server
* Mostly written in php to connect the DB to the web interface. Rest is html/css


## E/R diagram of database

![ER diagram](https://github.com/EmiliaSe/Image-Repository/blob/master/documentation/DB%20ER%20diagram.png)

idimage is used as the foreign key for colours, tags and moods. Auto-incremented

## Possible extensions

* User login, so images are tied back to a creator
* More complex searches
* Allow users option to declare new colours / moods not specified in upload page
* Improve UI
* Autocomplete / suggest when user starts typing search

## Screenshots
Main page
![Main page](https://github.com/EmiliaSe/Image-Repository/blob/master/documentation/mainpage%20screenshot.png)

Upload page
![Upload page](https://github.com/EmiliaSe/Image-Repository/blob/master/documentation/submission%20screenshot.png)

Sample search
![cat search](https://github.com/EmiliaSe/Image-Repository/blob/master/documentation/catsearch.gif)

Colour search
![orange search](https://github.com/EmiliaSe/Image-Repository/blob/master/documentation/orangesearch.gif)

Mood search
![cheerful search](https://github.com/EmiliaSe/Image-Repository/blob/master/documentation/cheerfulsearch.gif)
