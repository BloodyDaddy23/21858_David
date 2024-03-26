<?php
        include 'confi.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {   
            $username= $_POST['username'];
            $first_name = $_POST["first-name"];
            $email = $_POST["email"];
            $phone_number = $_POST["phone"];
            $password= $_POST["password"];
            
            
            $checkQuery = "SELECT * FROM user WHERE username  = '$username';";
            $checkResult = $conn->query($checkQuery);

            if ($checkResult->num_rows > 0) 
            {
                echo "Username already exists. Please choose a different one.";
            } 
            else 
            {
                $insertQuery = "INSERT INTO user (username,first_name, password, email, phone_number) VALUES ('$username','$first_name','$password', '$email', '$phone_number')";
                if ($conn->query($insertQuery) === TRUE) 
                {
                    echo "Registration successful. ";
                    header('location:login.php');
                    exit();
                } 
                else 
                {
                    echo "Error: " . $conn->error;
                }
            }
        }

        $conn->close();
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h3{
            color:yellow;
        }

        .signup-container {
            background-image: url('login2.jpg');
            padding: 80px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(252, 252, 3, 0.2);
        }

        .signup-container h1 {
            text-align:center;
            color:#010101;
        
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #eaebe1;
        }
        button {
            background: hsl(61, 100%, 48%);
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 22px;
        }

        button:hover {
            background: #f9f5f5;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
        <div class="form-group">
               <h3><label><mark> First Name</mark></label>
                <input type="text" id="first-name" name="first-name">
            </div>
            <div class="form-group">
               <h3><label><mark> User Name</mark></label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <h3><label><mark>Email</mark></label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
               <h3><label><mark>Phone Number</mark></label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
               <h3><label><mark>Password</mark></label>
                <input type="password" id="password" name="password">
            </div>
            <input class="button" type="submit" value="SignUp"></input>
        </form>

        <br>

        <a href="login.php">Back to Login</a>

        <br>
        
</body>
</html>
