<?php
$showModal = false;
$message ="";
$colour="";
// Check if the request method is POST
if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Connector/_dbconnect.php';
    // Retrieve form values
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["confirm_password"];

    // Validate if passwords match
    if($password == $cpassword) {
        // Passwords match, perform database insertion
        // Perform database insertion here
        // For example:
        $sql = "INSERT INTO users (user_name, user_surname, user_email, user_password) VALUES ('$name', '$lastName', '$email', '$password')";
        $result = $conn->query($sql);
        // If insertion is successful, set $showAlert to true
        // If there's any error, set $showError to true with the corresponding error message
        $message = "User has been created";
                $colour = "modal-content green";
                $showModal = true;
        $conn->close();
    } else {
        // Passwords don't match, set $showError to true
        $message = "Username or Password incorrect";
                $colour = "modal-content red";
                $showModal = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Movie</title>
    <link rel="stylesheet" href="register.css">
    <link rel="icon" href="../Assets/pop.ico">
</head>
<body>
    <?php require '../HF/header.php' ?>
    <?php if (isset($showModal) && $showModal): ?>
    <!-- register modal -->
    <div id='myModal' class='modal'>
        <div class='<?php echo $colour?>'>
            <span class='close'>&times;</span>
            <p class="message"><?php echo $message?></p>
        </div>
    </div>
    <?php endif; ?>
    <div class="register-container">
        <form class="register-form" action="register.php" method="POST">
            <h2 class="registrater-title">User Registration</h2>
            <label for="register-name">Name:</label>
            <input type="text" id="register-name" name="name" required>
            <label for="register-lastname">Last Name:</label>
            <input type="text" id="register-lastname" name="lastName" required>
            <label for="register-email">Correo Electrónico:</label>
            <input type="email" id="register-email" name="email" required>
            <label for="register-password">Contraseña:</label>
            <input type="password" id="register-password" name="password" required>
            <label for="register-confirm-password">Confirm Password:</label>
            <input type="password" id="register-confirm-password" name="confirm_password" required>
            <div class="captcha">
                <label class="captcha-label" for="captcha-input">Enter Captcha</label>
                <div class="preview"></div>
                <div class="captcha-form">
                    <input type="text" id="captcha-form" placeholder="Enter captcha text" required>
                    <button class="captcha-refresh setButton">Refresh</button>
                </div>
            </div>
            <button type="submit" class="setButton register" value="Register">Register</button>
        </form>
    </div>
    <?php require '../HF/footer.php' ?>
</body>
<script defer>
    (function(){
        // Array of fonts for the captcha
        const fonts = ["cursive","sans-serif","serif","monospace"];
        let captchaValue="";

        // Function to generate the captcha
        function generateCaptcha(){
            let value = btoa(Math.random()*1000000000);
            value= value.substr(0,5+Math.random()*5);
            captchaValue = value;
        }

        // Function to set the captcha on the page
        function setCaptcha(){
            let html = captchaValue.split("").map((char)=>{
                const rotate = -20 + Math.trunc(Math.random()*30);
                const font = Math.trunc(Math.random()*fonts.length);
                return `<span
                style="
                transform:rotate(${rotate}deg);
                font-family:monospace;
                "
                >${char}</span>`;
            }).join("");
            document.querySelector(".register-container .captcha .preview").innerHTML = html;
        }

        // Function to initialize captcha
        function initCaptcha(){
            document.querySelector(".register-container .captcha .captcha-refresh").addEventListener("click", function(){
                generateCaptcha();
                setCaptcha();
            });
            generateCaptcha();
            setCaptcha();
        }

        // Initialize captcha
        initCaptcha();

        // Event listener for form submission
        document.querySelector(".register-form").addEventListener("submit",function(event){
            event.preventDefault();
            let inputCaptchaValue = document.querySelector(".register-container .captcha input").value;
            if(inputCaptchaValue === captchaValue){
                this.submit();
            }else{
                document.querySelector(".captcha input").value = "";
                alert("Catpcha is not valid");
            }
        });
    })();
</script>
</html>
