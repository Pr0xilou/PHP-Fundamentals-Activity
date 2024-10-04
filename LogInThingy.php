<?php
session_start();
$resultMessage = "";
if (isset($_POST['LIB'])) {
    if (isset($_SESSION['username'])) {
        $loggedInUser = htmlspecialchars($_SESSION['username']);
        $resultMessage = "You need first to log out the account: <b>$loggedInUser</b>, first.";
    } else {
        $_User = $_POST['UName'];
        $_Pass = $_POST['Pass'];

        $hashedPassword = password_hash($_Pass, PASSWORD_DEFAULT);

        $_SESSION['username'] = $_User;

        $resultMessage = "User logged in: " . htmlspecialchars($_User) . "<br>Hashed Password: " . htmlspecialchars($hashedPassword);
    }
}
if (isset($_POST['LOB'])) {
    if (isset($_SESSION['username'])) {
        $loggedOutUser = htmlspecialchars($_SESSION['username']);

        unset($_SESSION['username']);
        $resultMessage = "Account successfully logged out: $loggedOutUser.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <p>Username: <input type="text" name="UName" placeholder="Username"></p>
        <p>Password: <input type="password" name="Pass" placeholder="Password"></p>
        <button type="submit" name="LIB">Log In</button>
        <br>
        <br>
        <button type="submit" name="LOB">Log Out</button>
    </form>
    <div>
        <?php
        if ($resultMessage) {
            echo $resultMessage;
        }
        ?>
    </div>
</body>
</html>