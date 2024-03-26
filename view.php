<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Data</title>
    <!--<link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" >-->
    <style>
        .hidden {
            display: none;
        }

        .box1{
            background-color: white;
        }
        td{
            padding: 10px;
        }
        table{
            background-color: ;
        }



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
<body style=" background-color:black;">
    <?php
    include "confi.php";

    $email = "";
    $password = "";

    $result = null;
    $error_message = "";
    $formVisible = true;

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate and sanitize user input
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Hide the form after processing the data
            $formVisible = false;
        } else {
            $error_message = "Error preparing SQL statement: " . $conn->error;
        }
    }
    ?>

    <form method="post" class="box <?php if (!$formVisible) echo 'hidden'; ?>">
        <h2>View User Data</h2>
        <label for="email" style="padding-right:28px;">Email:    </pre></label>
        <input type="text" id="email" name="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        
        <input type="submit" value="View Data">
        
            </form>

    <?php if (!$formVisible): ?>
        <?php
        if (!empty($error_message)) {
            echo "<p>Error: $error_message</p>";
        } elseif (isset($result)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
            <div class="box1>
                <table background-color = "white">
                    <tr>
                        <td background-color=white>
                            <form class="box">
                               
                                <label style="font-size: 50px;color:white;">
                                    <?php echo  htmlspecialchars("Hello  " .$row['username']); ?> 
                                    
                                
                                </label><br>
                                <label style="paddding-top :10px;">Email:</label>
                                <label ><?php echo  htmlspecialchars(   $row['email']); ?>
                                <br>
                                <label>Password:</label>
                                <label ><?php echo  htmlspecialchars(   $row['password']); ?>
                                </label><br>
                                
                                <br><br>
                             </form>
                            </td>

                            
                        </tr>
            </table>
            </div>
                <?php
                
                
                echo "<a href='update.php?email=" . htmlspecialchars($row['email']) . "'>Edit</a> | ";
                echo "<a href='delete.php?email=" . htmlspecialchars($row['email']) . "'>Delete</a>";
            } else {
                echo "<p>No user data found for the provided email.</p>";
            }
        }
        ?>
    <?php endif; ?>

</body>
</html>

<?php
if (isset($conn)) {
    $conn->close();
}
?>