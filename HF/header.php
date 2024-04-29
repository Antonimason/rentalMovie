<?php
// Signing In
session_start();
$menu;
// Cheking whether there is an active session or not
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (isset($_SESSION['userType'])) {
        $userType = $_SESSION['userType'];
        if ($userType == "admin") {
            // Mostrar contenido específico para administradores
            $menu = '<div class="username-display">Welcome, ' . $username . '</div>
            <a href="../index.php" class="navButton">Home</a>
            <a class="navButton" href="../Forms/newMovie.php">Upload Movie</a>
            <a class="navButton" href="../Forms/deleteMovie.php" >Delete Movie</a>
            <a class="navButton" href="../Forms/logout.php" >Log out</a>';
        } elseif ($userType == "user") {
            // Mostrar contenido específico para usuarios normales
            $menu = '
            <div class="username-display">Welcome, ' . $username . '</div>
            <a href="../index.php" class="navButton">Home</a>
            <a class="navButton" href="../Forms/myBooking.php">My Booking</a>
            <a class="navButton" href="../Forms/logout.php">Log out</a>';
        }
    }
}else{
    $username = null;
    $menu = '
            <a href="../index.php" class="navButton">Home</a>
            <a class="navButton" href="../Forms/login.php">Log In</a>
            <a class="navButton" href="../Forms/register.php">Register</a>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Movie</title>
    <link rel="stylesheet" href="../Assets/estilo.css">
</head>
<body>
<header class="header">
    <div class="header-container">
        <a href="../index.php"><h1 class="project-title">CCT Rental Movie</h1></a>
        <div class="nav-bar-menu">
                <img class="menu-icon menu" src="../Assets/menu.png" alt="menu"\>
            </div>
        <div class="menu-container">
            <?php echo $menu ?>
        </div>
    </div>
</header>
</body>
<script src="http://localhost/rentalMovie/Assets/menu.js" defer></script>
</html>