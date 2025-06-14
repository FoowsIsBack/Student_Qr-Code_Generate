<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="icon/person.png" type="image/png">
    <title>Login Account</title>
</head>
<body>

    <video autoplay muted loop>
        <source src="video/bg.mp4" type="video/mp4">
    </video>

    <div class="main">
        <div class="person">
            <img src="icon/person.png" alt="person">
        </div>
    
        <div class="ui">
            <form action="login.php" method="post">
                <h1>Login Account</h1>
                <h3>Username</h3>
                <input type="text" name="username" placeholder="Enter username">
                <h3>Password</h3>
                <input type="password" name="password" id="password" placeholder="Enter password">
                <div class="showP">
                    <input type="checkbox" name="show" id="showPass">
                    <label for="showPass">Show Password</label>
                </div>
                <div class="clickers">
                    <input class="done" type="submit" value="LOG IN">
                </div>
                <p>─────────── OR ───────────</p>
                <div class="registerAcc">
                    <button class="regAcc" type="button" onclick="window.location.href='register.php'">Create New Account</button>
                </div>
            </form>
        </div>
    </div>

    <div class="out">
        <a href="index.php">
            <img src="icon/signout.png" alt="logout">
        </a>
    </div>


        <?php
        $conn = mysqli_connect("localhost", "root", "", "qr_code");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';

            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $query);

            if (empty($username) || empty($password)) {
                echo("<script>alert('Fill up the Username and Password!'); window.location.href='login.php';</script>");
                exit;
            }

            if (mysqli_num_rows($result) === 1) {
                sleep(3);
                header("Location: section.php");
                exit;
            } else {
                echo("<script>alert('Incorrect username or password!'); window.location.href='login.php';</script>");
            }
        }

        mysqli_close($conn);
        ?>


    <script src="script.js"></script>

</body>
</html>
