<?php
include "confi.php";
$email = "";
$first_name = "";
$password = "";
$username = "";
$phone_number = "";

if (isset($_GET["email"])) 
{
    $email = $_GET["email"];

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $password = $row['password'];
        $username = $row['username'];
        $phone_number = $row['phone_number'];
    } 
    else 
    {
        echo "User not found.";
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $first_name = $_POST["first_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phone_number = $_POST["phone_number"];

    $updateSql = "UPDATE user SET first_name = '$first_name', username = '$username', 
    password = '$password', phone_number = '$phone_number' WHERE email = '$email'";

    if ($conn->query($updateSql) === TRUE) 
    {
        echo "User data updated successfully.";
    } 
    else 
    {
        echo "Error updating user data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Data</title>
    <style>
        body 
        {
            background-image: url('back1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container 
        {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h2 
        {
            color: #333;
        }

        label 
        {
            display: block;
            margin-top: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"], 
        input[type="password"] 
        {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] 
        {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover 
        {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User Data</h2>

        <form method="post">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            <br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
            <br><br>
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required>
            <br><br>
            <input type="submit" value="Update Data">
        </form>
    </div>
</body>
</html>

<?php

if (isset($conn)) 
{
    $conn->close();
}
?>
