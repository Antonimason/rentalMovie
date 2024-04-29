<?php
// Signing In
session_start();
$userid = "";
$showModal = false;
$message ="";
$colour="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['userType'])) {
        $userType = $_SESSION['userType'];
        if($userType == "admin"){
            $showModal = true;
            $message = "Sorry, Administrators cannot book movies";
            $colour = "modal-content red";
        }else{
            if (isset($_SESSION['userID'])) {
                $userid= $_SESSION['userID'];
            }
        require_once './Connector/_dbconnect.php';
        $movietitle = $_POST['movie'];
        $username;
        $id;
        $sql = "SELECT * FROM movies WHERE movie_title = '$movietitle'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["movie_id"];
            }
            // Usuario encontrado, redirige a la página de inicio de sesión exitosa
            $cinema = $_POST['cinema'];
            $time = $_POST['time'];
            $ticket = $_POST['ticket'];
            $sql2 = "INSERT INTO myBookings (user_id, movie_id, movie_time,ticket_amount,cinema) 
            VALUES ('$userid', '$id', '$time','$ticket','$cinema')";
            $result = $conn->query($sql2);
            $showModal = true;
            $message = "Movie has been booked";
            $colour = "modal-content green";
            $conn->close();
        }}
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Movie</title>
    <link rel="stylesheet" href="http://localhost/rentalMovie/Assets/estilo.css">
    <link rel="icon" href="./Assets/pop.ico">
</head>
<body>
    <!--   Header    -->
    <?php include('./HF/headerIndex.php');?>
    <?php if (isset($showModal) && $showModal): ?>
    <!-- Modal para administradores -->
    <div id='myModal' class='modal'>
        <div class='<?php echo $colour?>'>
            <span class='close'>&times;</span>
            <p class="message"><?php echo $message?></p>
        </div>
    </div>
    <?php endif; ?>
    <!--  Carousel display box  -->
    <div class="carrousel" id="container1">
        <div class="back button-carousel"><p class="backward">&lt</p></div>
        <div class="carrousel-image">
            <img class="picture" id="31" src="https://cdn.mos.cms.futurecdn.net/VWFncKUBaF9E3v4k8QkJbf.jpg" alt="">
            <h3 class="carousel-title">Dune: Part II</h3>
        </div>
        <div class="forth button-carousel"><p class="forward">&gt</p></div>
    </div>
    <!--        Movie Content box     -->
    <div class="movieInfo-container">
        <div class="escape-container">
            <p class="escape">x</p>
        </div>
        <div class="movie-content">
            <h4 id="trailer-title">Trailer</h4>
            <div class="movie-video">
            </div>
            <div class="movie-content-firstLine">
                <img src="" alt="" class="movie-img"></img>
                <div class="movie-title"></div>
            </div>
            <div class="movie-content-secondLine">
                <p class="movie-id space"></p>
                <p class="movie-runtime space"></p>
                <p class="movie-genre space"></p>
                <p class="movie-year space"></p>
                <p class="movie-age space"></p>
                <p class="movie-director space"></p>
                <p class="movie-actors space"></p>
                <p class="movie-synopsis space"></p>
            </div>
            <button class="booking">Book now</button>
        </div>
    </div>
    <!--                Form box             -->
    <form class="form" id="myForm" action="index.php" method="POST">
        <h3 class="form-detail" id="formTitle">Introduce your personal information</h3>
        <label for="moviesel">Movie</label>
        <input type="text" id="moviesel" name="movie" readonly/><span class="firstN"></span>
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName"required/><span class="firstN"></span>
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" required/><span class="lastN"></span>
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email-address" required/><span class="emailA"></span>
        <label for="cinema">Choose your cinema</label>
        <select id="cinema" name="cinema" required>
            <option class="option" value="cinema">Select a Cinema</option>
            <option class="option" value="Dundrum SC">Dundrum SC</option>
            <option class="option" value="Ovni Sc">Ovni SC</option>
            <option class="option" value="Claire Hall SC">Claire Hall SC</option>
        </select><span class="cine"></span>
        <label for="time">Choose the time</label>
        <select id="time" name="time" required>
            <option class="option" value="time">Time</option>
            <option class="option" value="13:00">13:00</option>
            <option class="option" value="15:30">15:30</option>
            <option class="option" value="17:25">17:25</option>
            <option class="option" value="20:40">20:40</option>
            <option class="option" value="22:40">22:20</option>
        </select><span class="tim"></span>
        <label for="ticketQuantity">Ticket Amount</label>
        <input id="ticketQuantity" name="ticket" type="number" min="1" max="10" required/><span class="ticketQ"></span>
        <div class="button-section">
            <button type="button" class="setButton cancel" value="Cancel">Cancel</button>
            <button type="submit" class="setButton book" value="Book Ticket">Book Ticket</button>
        </div>
</form>
    <!--     Movie Catalog    -->
    <h4 id="movieList-title">Screenings for Dublin</h4>

    <div class="movies-list" id="movies-list">
        <?php
        $searchTerm = "";

        // Verificar si se ha enviado un término de búsqueda
        if(isset($_POST['searcher'])) {
            $searchTerm = $_POST['searcher'];
        }
        include './Connector/_dbconnect.php';
        // Consulta SQL para buscar películas
        $sql = "SELECT * FROM movies";
        
        // Agregar condición de búsqueda si se ha proporcionado un término de búsqueda
        if(!empty($searchTerm)) {
            $sql .= " WHERE movie_title LIKE '%$searchTerm%' or movie_genre LIKE '%$searchTerm%' or movie_actors LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    echo '<div class="movie">
            <img src="' . $row["movie_imageUrl"] . '" id="' . $row["movie_id"] . '" alt="' . $row["movie_title"] . '" class="movieListPicture"/>
            ' . $row["movie_title"] . '</div>';
                }
            }else {
                echo '<h3 class="">No movies to show</h3>';
            }
            $conn->close();
        }else{
        // Ejecutar la consulta SQL
        $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    echo '<div class="movie">
            <img src="' . $row["movie_imageUrl"] . '" id="' . $row["movie_id"] . '" alt="' . $row["movie_title"] . '" class="movieListPicture"/>
            ' . $row["movie_title"] . '</div>';
                }
            }else {
                echo '<h3 class="">No movies to show</h3>';
            }
            $conn->close();
        }
        ?>
    </div>
    <!--     Footer      -->
    <footer>
        <div class="college-container">
            <img class="college-logo" src="https://www.cct.ie/wp-content/uploads/CCT_Logo_New_Aug_17-289x100.png" alt="" />
        </div>
            <div class="badge-container">
                <div class="badge">
                    <img class="student-picture" src="./Assets/antonio.jpg" alt="Antonio Giambra"/>
                    <p class="student-name">Antonio Giambra</p>
                </div>
            </div>
    </footer>
</body>
</html>