<?php
$showModal = false;
$message ="";
$colour="";
// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    require_once '../Connector/_dbconnect.php';

    // Check if the login type is specified in the form data
    if(isset($_POST['login_type'])) {
        // Get the login type from the form data
        $login_type = $_POST['login_type'];
        
        // Process the form based on the login type
        if($login_type == "user") {
            // Process user login form
            $username = $_POST["user-username"];
            $password = $_POST["user-password"];
            
            // Query to check user credentials in the database
            $sql = "SELECT * FROM users WHERE user_email = '$username' AND user_password = '$password'";
            $result = $conn->query($sql);

            // Check if user is found in the database
            if ($result->num_rows > 0) {
                // Fetch user data
                $row = $result->fetch_assoc();
                $username = $row['user_name'];
                $userType = "user";
                $userID = $row['user_id'];
                
                // Start session and set session variables
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['userType'] = $userType;
                $_SESSION['userID'] = $userID;
                
                // Redirect to index page after successful login
                header("Location: ../index.php");
                exit();
            } else {
                // Display error message if user not found
                $message = "Username or Password incorrect";
            $colour = "modal-content red";
            $showModal = true;
            }

            // Close database connection
            $conn->close();
        } elseif($login_type == "admin") {
            // Process admin login form
            $username = $_POST["admin-username"];
            $password = $_POST["admin-password"];
            
            // Query to check admin credentials in the database
            $sql = "SELECT * FROM administrator WHERE admin_email = '$username' AND admin_password = '$password'";
            $result = $conn->query($sql);

            // Check if admin is found in the database
            if ($result->num_rows > 0) {
                // Fetch admin data
                $row = $result->fetch_assoc();
                $username = $row['admin_name'];
                $userType = "admin";
                
                // Start session and set session variables
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['userType'] = $userType;
                
                // Redirect to index page after successful login
                header("Location: ../index.php");
                exit();
            } else {
                // Display error message if admin not found
                $message = "Username or Password incorrect";
            $colour = "modal-content red";
            $showModal = true;
            }

            // Close database connection
            $conn->close();
        } else {
            // Display error message for invalid login type
            $message = "User type not valid";
            $colour = "modal-content red";
            $showModal = true;
        }
    } else {
        // Display error message if login type is not specified
        $message = "User type not valid";
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
    <link rel="stylesheet" href="http://localhost/rentalMovie/Assets/estilo.css">
    <link rel="icon" href="../Assets/pop.ico">
</head>
<body>
<?php require '../HF/header.php' ?>
<?php if (isset($showModal) && $showModal): ?>
    <!-- User modal -->
    <div id='myModal' class='modal'>
        <div class='<?php echo $colour?>'>
            <span class='close'>&times;</span>
            <p class="message"><?php echo $message?></p>
        </div>
    </div>
    <?php endif; ?>
<div class="detail-entry">
<div class="form-selection user-container">
    <h4 class="form-selection-title">User Login</h4>
    <form class="form-selection--form" action="loginUser.php" method="POST">
        <input type="hidden" name="login_type" value="user">
        <label for="user-username">Username</label>
        <input type="text" id="user-username" name="user-username" required \>
        <label for="user-password">Password</label>
        <input type="password" id="user-password" min="8" max="30" required name="user-password"\>
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
            <button type="submit" class="setButton login" value="Login">Submit</button>
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
        // Array of fonts for captcha
        const fonts = ["cursive","sans-serif","serif","monospace"];
        let captchaValue="";
        
        // Function to generate captcha
        function generateCaptcha(){
            let value = btoa(Math.random()*1000000000);
            value= value.substr(0,5+Math.random()*5);
            captchaValue = value;
        }
        
        // Function to set captcha
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
            document.querySelector(".user-container .captcha .preview").innerHTML = html;
        }
        
        // Function to initialize captcha
        function initCaptcha(){
            document.querySelector(".user-container .captcha .captcha-refresh").addEventListener("click", function(){
                generateCaptcha();
                setCaptcha();
            });
            generateCaptcha();
            setCaptcha();
        }
        
        // Call initialize captcha function
        initCaptcha();

        // Add event listener for form submission
        document.querySelector(".form-selection--form").addEventListener("submit",function(event){
            event.preventDefault();
            let inputCaptchaValue = document.querySelector(".user-container .captcha input").value;
            if(inputCaptchaValue === captchaValue){
                this.submit();
            }else{
                document.querySelector(".captcha input").value = "";
                alert("Catpcha is not valid");
            }
        })
    })();
</script>
</html>
