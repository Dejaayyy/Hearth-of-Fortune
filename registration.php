<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
            $userName = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (empty($userName) OR empty($email) OR empty($password)) {
                array_push($errors, "All fields are required");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }

            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }

            require_once "db.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                array_push($errors, "Email Already Exist!");
            }

            if (count($errors) > 0) {
                foreach($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                require_once "db.php";
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $userName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered Successfully!</div>";
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>

        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="User Name:">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Register">
            </div>
            <a href="index.html" class="btn btn-primary">Go back</a>
            <a href="game.php" class="btn btn-primary">Go to Game</a>
        </form>
        
        <div><p>Already Registered?<a href="login.php"> Login Here </a></p></div>
    </div>

    <script src="script.js"></script>

</body>
</html>
