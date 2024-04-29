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
    <section class="bookings">
        <table class="table">
            <tr>
                <th class="space">Book ID</th>
                <th class="space">Name</th>
                <th class="space">Movie</th>
                <th class="space">Time</th>
                <th class="space">Ticket</th>
                <th class="space">Cinema</th>
            </tr>
    <?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (isset($_SESSION['userID'])) {
        $userid= $_SESSION['userID'];
        require_once '../Connector/_dbconnect.php';
        $sql = "SELECT
        b.book_id,
        u.user_name,
        m.movie_title,
        b.movie_time,
        b.ticket_amount,
        b.cinema
    FROM
        myBookings b
        INNER JOIN users u ON b.user_id = u.user_id
        INNER JOIN movies m ON b.movie_id = m.movie_id
    WHERE
        b.user_id = '$userid'";
        $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    echo '<tr>';
    echo '<td class="space">' . $row["book_id"] . '</td>';
    echo '<td class="space">' . $row["user_name"] . '</td>';
    echo '<td class="space">' . $row["movie_title"] . '</td>';
    echo '<td class="space">' . $row["movie_time"] . '</td>';
    echo '<td class="space">' . $row["ticket_amount"] . '</td>';
    echo '<td class="space">' . $row["cinema"] . '</td>';
    echo '</tr>';
                }
            }else {
                echo '<h3 class="">No movies booked</h3>';
            }

        // Cierra la conexión con la base de datos
        $conn->close();
    }

}?>
</table>
    </section>
    <?php require '../HF/footer.php' ?>
</body>
</html>