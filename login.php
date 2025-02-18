<?php
    include ("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body style="background-color: gray;">
    <div class="container">
        <div class="info">
            Hello! 
            <p>This is my Sign Up and Login Form project as an introduction on using PHP!</p>
        </div>
        <form action="login.php" method="post">
            <p style="font-size: 25px; margin-top: 0px; font-weight: 700;">Login</p>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <div class="password-setup">
                <label>Password</label>
                <input type="password" name="password" id="password" required>
                <span class="show-password" id="show-password"><img src="assets/eye-password-hide-svgrepo-com.svg" alt="hide-password" id="show-password-icon"></span>
            </div>

            <div class="login-position">
                <input type="submit" name="login" value="Login">
            </div>
            
            <hr style="margin-top: 20px; border-color: B7B7B7;">
            <div class="signup-position">
                Don't have an account?<a href="index.php" style="font-size: 16px;">Sign Up</a>
            </div>

            <div class="other-options">
                <h4>--OR--</h4>
                <div class="options">
                    <img src="assets/google-svgrepo-com.svg" alt="google">
                    <img src="assets/facebook-svgrepo-com.svg" alt="facebook" style="margin-right: 0;">
                </div>
            </div>
        </form>
    </div>
    <script src="scripts/login.js"></script>
</body>
</html>

<?php
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if the username is detected!
        $sql_find_username = "SELECT * FROM PHPTABLE WHERE USERNAME = '$username'";
        $result = mysqli_query($connection, $sql_find_username);

        if(mysqli_num_rows($result)>0){
            $check_password = mysqli_fetch_assoc($result);
            if(password_verify($password, $check_password["pass"])){
                echo '
                <div class="popup">
                    Hello 
                </div>
                ';
            } else {
                echo '
                <div class="popup" style="background-color: red">
                    Incorrect Password!
                </div>
                ';
            }
        } else {
            echo '
                <div class="popup" style="background-color: red">
                    Username does not exist!
                </div>
                ';
        }

    }
?>
