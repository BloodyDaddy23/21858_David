<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
     
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('login1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-image: url('1.jpg');
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0px 4px 6px rgba(230, 246, 8, 0.1);
            width: 350px;
        }

        h1{
            color:hsl(61, 100%, 48%);
            font-size: 24px;
            margin-bottom: 20px;
        }
        h3,p{
            color:hsl(61, 100%, 48%);
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-bottom: 2px solid #f30000;
            outline: none;
            font-size: 16px;
        }

        .button {
            background: hsl(61, 100%, 48%);
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 22px;
            font-family:Agency fb;
        }

        .button:hover {
            background: #f9f5f5;
        }

        p {
            margin-top: 15px;
            color: #555;
        }


    </style>
</head>
<body>
    <div class="login-container">
    <h1><center><font face="Agency fb" size="6">Login</font></center></h1>
    <center><p>To Dive Into The Delights Of Taste</p><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            require_once("confi.php");

            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) 
            {
                header("Location:login.php");
                exit();
            } 
            else 
            {
                echo "<p style='color: black;'>Invalid username or password.</p>";
            }

            $conn->close();
        }
        ?>
        <form action="main.html" method="post">
            <h3><label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <h3><label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <center> 
                <input class="button" type="submit" value="yummy"></input></center>
        <h3>Don't have an account?</h3> 
        <a href="signup.php">Sign up</a>
        <br>
        <a href="forgotpassword.php">Forgot password?</a>
    </div>
</body>
</html>
