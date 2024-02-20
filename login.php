<?php
    // Start the session
    session_start();
        if(isset($_SESSION["users"])){
            header("Location: game.html");
        }

    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        require_once "db.php";
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user["password"])) {
                $_SESSION["users"] = "yes";
                header("Location: game.html");
                exit();
            } else {
                $errorMessage = "Password does not match";
            }
        } else {
            $errorMessage = "Email does not match";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOF Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
            <a href="registration.php" class="btn btn-primary">Go back</a>
            <a href="game.html" class="btn btn-primary">Go to Game</a>
        <form>
        <div><p>Not Registered yet? <a href="registration.php"> Register Here </a></div>
    </div>
</body>
</html>