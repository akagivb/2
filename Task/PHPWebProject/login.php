<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
    $mypassword = mysqli_real_escape_string($mysqli,$_POST['password']);

    $sql = "SELECT userid FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: main.php");
    }else {
      echo
            $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./scripts/style.css" />
</head>
<body>
    <div id="i2">
        <form action="" method="post">
            <img src="./img/logo.png" />
            <p>Please, Sign in to proceed!</p>
            <label>
                <b>Username</b>
            </label>
            <input type="text" placeholder="Enter Username" name="username" required />
            <p></p>
            <label>
                <b>Password</b>
            </label>
            <input type="password" placeholder="Enter Password" name="password" required />
            <p></p>
            <button type="submit"><img src="./img/login.png"/></button>
        </form>
    </div>
</body>
</html>