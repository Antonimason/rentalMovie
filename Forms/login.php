<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Movie</title>
    <link rel="stylesheet" href="../Assets/estilo.css">
    <link rel="icon" href="../Assets/pop.ico">
</head>
<body>
    <?php require '../HF/header.php' ?>

    <section class="detail-entry">
        <div class="form-selection" style="visibility: visible;">
            <h3 class="form-selection-title">Please select User to log in</h3>
            <div class="form-selection-container">
                <a href="loginUser.php">
                    <div class="form-selection-selected user">
                        <img class="form-selection-image" src="../Assets/user.png" alt="User"\>
                        <h4 class="form-selection-name">User</h4>
                    </div>
                </a>
                <a href="loginAdmin.php">
                    <div class="form-selection-selected admin">
                        <img class="form-selection-image" src="../Assets/user.png" alt="Admin"\>
                        <h4 class="form-selection-name">Administrator</h4>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <?php require '../HF/footer.php' ?>
</body>
</html>