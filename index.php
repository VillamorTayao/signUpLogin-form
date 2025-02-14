<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Sign Up!</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <label>Username</label>
            <input type="text" name="username" id="username" required>

            <label>Password</label>
            <input type="password" name="password" id="password" required>

            <label>Email</label>
            <input type="email" name="email" id="email" required>

            <div class="submit-position">
                <input type="submit" name="signup" value="Sign Up">
            </div>
            
            <div class="login-postion">
                Already have an account?<a href="login.php">Login!</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST["signup"])){
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // password hashing
        $email = $_POST["email"];
        
        // registration starts here
        $sql_query = "INSERT INTO phptable (USERNAME, PASS, EMAIL)
        VALUES ('$username', '$password', '$email');";

        // query for checking username duplicates
        $checkUsernameQuery = "SELECT * FROM phptable WHERE USERNAME = '$username'";
        $inputs = mysqli_query($connection, $checkUsernameQuery);

        try{
            if(mysqli_num_rows($inputs) > 0){
                echo "Username already exist!";
            } else {
                mysqli_query($connection, $sql_query);
                echo "Registered!";
            }
        } catch (Exception){
            echo "Something is wrong!";
        }
        
        mysqli_close($connection);
    }
?>