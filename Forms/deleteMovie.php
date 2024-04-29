<?php
$showModal = false;
$message ="";
$colour="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Connector/_dbconnect.php';

    // Verifica si se recibieron los datos necesarios
    if(isset($_POST['id']) && isset($_POST['name'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];

        // Utiliza sentencias preparadas para evitar la inyección SQL
        $sql = "DELETE FROM movies WHERE movie_id = ? AND movie_title = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $id, $name);
        
        // Ejecuta la consulta
        if ($stmt->execute()) {
          $message ="Movie has been deleted";
          $colour="modal-content green";
          $showModal = true;
        } else {
          $message ="Sorry, the movie provided is not in the database";
          $colour="modal-content red";
          $showModal = true;
        }

        // Cierra la declaración y la conexión
        $stmt->close();
        $conn->close();
    } else {
        $showModal = true;
          $message ="Information missing to delete the movie";
          $colour="modal-content red";
    }
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
    <!-- Modal para administradores -->
    <div id='myModal' class='modal'>
        <div class='<?php echo $colour?>'>
            <span class='close'>&times;</span>
            <p class="message"><?php echo $message?></p>
        </div>
    </div>
    <?php endif; ?>
    <section class="delete-container">
    <form class="form" action="deleteMovie.php" method="POST">
        <h3 class="form-detail" id="formTitle">Delete Movie</h3>
        <label for="id">Introduce the movie ID</label>
        <input type="number" id="id" name="id" placeholder="25" required/><span class="firstN"></span>
        <label for="name">Introduce the name of the movie</label>
        <input type="text" id="name" name="name" placeholder="Fast X" required/><span class="lastN"></span>
        <div class="button-section">
            <button type="submit" class="setButton book" value="Submit">Submit</button>
        </div>
    </form>
    </section>
    <?php require '../HF/footer.php' ?>
</body>
</html>