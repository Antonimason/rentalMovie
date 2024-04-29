<?php
$showModal = false;
$message ="";
$colour="";
// Verifies if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Connector/_dbconnect.php';

    // Checks if login_type is set in the POST data
    if(isset($_POST['login_type'])) {
        $login_type = $_POST['login_type']; // Processes the form according to the login type

        // Processes the form for user login
        if($login_type == "user") {
            // Retrieve username and password from the form
            $username = $_POST["user-username"];
            $password = $_POST["user-password"];
            
            // Query to select user from database based on username and password
            $sql = "SELECT * FROM users WHERE user_email = '$username' AND user_password = '$password'";
            $result = $conn->query($sql);

            // Checks if any result was found
            if ($result->num_rows > 0) {
                // User found, sets session variables and redirects to successful login page
                $row = $result->fetch_assoc();
                $username = $row['user_name'];
                $userType = "user";
                $userID = $row['user_id'];
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['userType'] = $userType;
                $_SESSION['userID'] = $userID;
                header("Location: ../index.php");
                exit();
            } else {
                // User not found, shows an error message or redirects to the failed login page
                header('Location: http://localhost/CA/Forms/loginAdmin.php');
          die();
            $message = "Username or Password incorrect";
            $colour = "modal-content red";
            $showModal = true;
            }

            $conn->close();
        } elseif($login_type == "admin") {
            // Processes the form for admin login
            $username = $_POST["admin-username"];
            $password = $_POST["admin-password"];
            // Rest of the code to authenticate admin...
            $sql = "SELECT * FROM administrator WHERE admin_email = '$username' AND admin_password = '$password'";
            $result = $conn->query($sql);

            // Checks if any result was found
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['admin_name'];
                $userType = "admin";
                // User found, sets session variables and redirects to successful login page
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['userType'] = $userType;
                header("Location: ../index.php");
                exit();
            } else {
                // User not found, shows an error message or redirects to the failed login page
                $message = "Username or Password incorrect";
                $colour = "modal-content red";
                $showModal = true;
            }

            $conn->close();
        } else {
            // If login_type is neither "user" nor "admin", shows an error message
            $message = "Login type not valid";
            $colour = "modal-content red";
            $showModal = true;
        }
    } else {
        // If login_type is not specified in the POST data, shows an error message
            $message = "Login type not valid";
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
    <link rel="stylesheet" href="../Assets/estilo.css">
    <link rel="icon" href="../Assets/pop.ico">
</head>
<body>
<?php require '../HF/header.php' ?>
<?php if (isset($showModal) && $showModal): ?>
    <!-- administrator modal -->
    <div id='myModal' class='modal'>
        <div class='<?php echo $colour?>'>
            <span class='close'>&times;</span>
            <p class="message"><?php echo $message?></p>
        </div>
    </div>
    <?php endif; ?>
<div class="detail-entry">
<div class="form-selection admin-container">
    <h4 class="form-selection-title">Admin Login</h4>
    <form class="form-selection--form" action="loginAdmin.php" method="POST">
        <input type="hidden" name="login_type" value="admin">
        <label for="admin-username">Username</label>
        <input type="text" id="admin-username" name="admin-username" required\>
        <label for="admin-password">Password</label>
        <input type="password" id="admin-password" name="admin-password" required min="8" max="30"\>
        <div class="captcha">
            <label for="captcha-input">Enter Captcha</label>
            <div class="preview"></div>
            <div class="captcha-form">
                <input type="text" id="captcha-form" placeholder="Enter captcha text" required>
                <button class="captcha-refresh">Refresh</button>
            </div>
        </div>
        <div class="button-section">
            <button class="setButton back">Back</button>
            <button type="submit" class="setButton login" value="Login">Login</button>
        </div>
    </form>
</div>
</div>
<?php require '../HF/footer.php' ?>
</body>
<script defer>
    (function(){
        // Event listener for back button click
        document.querySelector(".setButton.back").addEventListener("click", function(){
            // Navigate back in the browser history
            window.history.back();
        });
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
            document.querySelector(".admin-container .captcha .preview").innerHTML = html;
        }

        // Function to initialize captcha
        function initCaptcha(){
            document.querySelector(".admin-container .captcha .captcha-refresh").addEventListener("click", function(){
                generateCaptcha();
                setCaptcha();
            });
            generateCaptcha();
            setCaptcha();
        }

        // Initialize captcha
        initCaptcha();

        // Event listener for form submission
        document.querySelector(".form-selection--form").addEventListener("submit",function(event){
            event.preventDefault();
            let inputCaptchaValue = document.querySelector(".admin-container .captcha input").value;
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
