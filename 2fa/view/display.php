<!DOCTYPE html>
<html>
<head>
    <title>Display Page</title>
</head>
<body>
    <?php include '../controller/Controller.php'; ?>

    <h2>Display Page</h2>
<br><br>
    <?php
    session_start();
    // Retrieve user information from the Model
    if (isset($_SESSION['username']))
    {
        $user = new Controller();
        $username = $_GET['username'];
        $token = $_GET['token'];
        $userInfo = $user->viewDisplay($username,$token);
        if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true)
        {
            

            echo "<h3>User Information:</h3><p><b>Name:</b> {$userInfo['Firstname']} {$userInfo['Lastname']}</p>";
            echo "<p><b>Address:</b> {$userInfo['Address']}</p>";
            echo "<p><b>Balance:</b> \${$userInfo['Balance']}</p>";
            echo "<p><b>Email:</b> {$userInfo['email']}</p>";
            echo "<a href='logout.php'>Logout</a>";
        }
        
    }
    else {
        echo "<h3> You are logged out!!!</h3>";
        echo '<a href="../index.php">Login here</a>';

    }
    ?>


</body>
</html>
