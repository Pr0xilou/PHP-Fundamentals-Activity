<?php
session_start();
$result = '';
if (isset($_POST['SButton'])) {
    $_A = $_POST['valofa'];
    $_B = $_POST['valofb'];
    $_C = $_POST['valofc'];
    
    $_Answer = ($_B ** 2) - (4 * $_A * $_C);
    $result = "Result: " . $_Answer; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuadThingy</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h1>Discriminant of a Quadratic Equation</h1>
        <p>A: <input type="number" name="valofa" placeholder="Value of A" required></p>
        <p>B: <input type="number" name="valofb" placeholder="Value of B" required></p>
        <p>C: <input type="number" name="valofc" placeholder="Value of C" required></p>
        <button type="submit" name="SButton">Submit</button>
    </form>
    <?php if ($result): ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>