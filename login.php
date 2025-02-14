<?php
    include ("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>

        <input type="submit" name="login" value="Login">
        
        <br>
        <a href="index.php">Go to Registration form</a>
    </form>
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
                echo "Hello!";
            } else {
                echo "Password Incorrect!";
            }
        } else {
            echo "Username not detected!";
        }

    }
?>
