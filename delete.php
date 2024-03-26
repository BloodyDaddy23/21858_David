<?php
include "confi.php";


$email = "";

if (isset($_GET["email"])) 
{
    $email = $_GET["email"];
} 
else 
{
    echo "Email parameter not provided.";
    exit();
}

if (isset($_POST["confirm_delete"])) {
    $sql = "DELETE FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) 
    {
        echo "User data deleted successfully.<a href='signup.php'>return home</a>";
        
    }
    else 
    {
        echo "Error deleting user data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Data</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h2>Delete User Data</h2>
        <p>Are you sure you want to delete your data?</p>
        <form method="post">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <button type="submit" name="confirm_delete">Confirm Delete</button>
            <a href="view.php">Cancel</a>
        </form>
    </div>
</body>
</html>