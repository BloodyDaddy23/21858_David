<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image:url('login3.jpg');
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

        .set-password-container {
            background-color: black;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color:yellow;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p{
            color:yellow;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: yellow;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
    
        }

        button[type="submit"]:hover {
            background-color: #f9f5f5;
        
        }

        #success-notification {
            display: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="forgot-password-container">
    <h2>Forgot Your Password? Oops...But No Worries :)</h2>
    <div class="set-password-container">
        <h2>Set New Password</h2>
        <p>Enter your new password below.</p>
        <form action="#" method="post" onsubmit="return showSuccessNotification()">
            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Set Password</button>
        </form><br>
        <div id="success-notification">
            New password set successfully!
        </div>
        <button onclick="redirectToLoginPage()">Back</button>
    </div>

    <script>
        function showSuccessNotification() {
           
            var notification = document.getElementById("success-notification");
            notification.style.display = "block";

            
            return false;
        }

        function redirectToLoginPage() {

            window.location.href = "login.php";
        }
    </script>
</body>
</html>
        