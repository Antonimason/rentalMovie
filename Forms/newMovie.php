<?php
$showModal = false; // Variable to control whether to display the modal or not
$message =""; // Variable to store the message to be displayed in the modal
$colour=""; // Variable to set the color of the modal
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Checks if the form is submitted using POST method
    require_once '../Connector/_dbconnect.php'; // Includes the database connection file
    // Retrieves form data using $_POST superglobal
    $title = $_POST['title'];
    $runtime = $_POST['runtime'];
    $classification = $_POST['classification'];
    $release = $_POST['release'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $actors = $_POST['actors'];
    $synopsis = $_POST['synopsis'];
    $imageUrl = $_POST['imageUrl'];
    $image2Url = $_POST['image2Url'];
    $videoUrl = $_POST['videoUrl'];
    // SQL query to insert movie data into the database
    $sql = "INSERT INTO movies (movie_title, movie_runtime, movie_classification, movie_release,movie_genre,movie_director, movie_actors,movie_synopsis,movie_imageUrl,movie_image2Url,movie_videoUrl) 
    VALUES ('$title', '$runtime', '$classification','$release', '$genre','$director','$actors', '$synopsis', '$imageUrl', '$image2Url','$videoUrl')";
    $result = $conn->query($sql); // Executes the SQL query
    if($result){ // Checks if the query executed successfully
      $message = "Movie Added to the Database"; // Sets success message
      $colour = "modal-content green"; // Sets modal color to green for success
      $showModal = true; // Sets $showModal to true to display the modal
    } else {
      $message = "Sorry, there has been an error uploading the movie."; // Sets error message
      $colour = "modal-content red"; // Sets modal color to red for error
      $showModal = true; // Sets $showModal to true to display the modal
    }
    $conn->close(); // Closes the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Movie</title>
    <link rel="stylesheet" href="newMovie.css">
    <link rel="icon" href="../Assets/pop.ico">
</head>
<body>
    <?php require '../HF/header.php' ?>
    <?php if (isset($showModal) && $showModal): ?>
    <!-- newMovie modal -->
    <div id='myModal' class='modal'>
        <div class='<?php echo $colour?>'>
            <span class='close'>&times;</span>
            <p class="message"><?php echo $message?></p>
        </div>
    </div>
    <?php endif; ?>
    <div class="newMovie-container">
    <form class="form" action="../index.php" method="POST">
        <h3 class="form-detail" id="formTitle">Upload New Movie</h3>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Title" required/><span class="firstN"></span>
        <label for="runtime">Runtime</label>
        <input type="text" id="runtime" name="runtime" placeholder="2h 30m" required/><span class="lastN"></span>
        <label for="classification">Classification</label>
        <input type="text" id="classification" name="classification" placeholder="12A" required/><span class="emailA"></span>
        <label for="release">Release Year</label>
        <input type="text" id="release" name="release" placeholder="2024" required/><span class="emailA"></span>
        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" placeholder="Crime, Action" required/><span class="emailA"></span>
        <label for="director">Director</label>
        <input type="text" id="director" name="director" placeholder="Full Name" required/><span class="emailA"></span>
        <label for="actors">Actors</label>
        <input type="text" id="actors" name="actors" placeholder="Vin Diesel, Robert Downey, Elvis Presley" required/><span class="emailA"></span>
        <label for="synopsis">Synopsis</label>
        <input type="text" id="synopsis" name="synopsis" placeholder="Synopsis" required/><span class="emailA"></span>
        <label for="imageUrl">Please provide a link of an image in vertical format</label>
        <input type="text" id="imageUrl" name="imageUrl" placeholder="Image URL" required/><span class="emailA"></span>
        <label for="image2Url">Please provide a link of an image in horizontal format</label>
        <input type="text" id="image2Url" name="image2Url" placeholder="Image URL" required/><span class="emailA"></span>
        <label for="videoUrl">Please provide a link of a video trailer</label>
        <input type="text" id="videoUrl" name="videoUrl" placeholder="Video URL" required/><span class="emailA"></span>
        <div class="button-section">
            <button type="submit" class="setButton book" value="Submit">Submit</button>
        </div>
    </form>
</div>
    <?php require '../HF/footer.php' ?>
</body>
</html>