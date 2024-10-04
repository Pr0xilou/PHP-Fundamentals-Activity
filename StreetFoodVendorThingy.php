<?php
    $receipt = ""; 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $order = $_POST['order'];
        $quantity = $_POST['quantity'];
        $cash = $_POST['cash'];
        $menu_prices = array(
            'Burger' => 50,
            'Fries' => 75,
            'Steak' => 150
        );
        $total_amount = $menu_prices[$order] * $quantity;
        if ($cash < $total_amount) {
            $receipt = "<p style='color: red;'>Sorry, your current balance is not enough.</p>";
        } else {
            $change = $cash - $total_amount;

            $current_date_time = date('m/d/Y h:i A');

            $receipt = "
                <div class='receipt'>
                    <h3>Receipt</h3>
                    <p>Total Price: " . htmlspecialchars($total_amount) ."</p>
                    <p>You Paid: " . htmlspecialchars($cash) ."</p>
                    <p>Change: " . htmlspecialchars($change) ."</p>
                    <p>" . htmlspecialchars($current_date_time) ."</p>
                </div> ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PishBolanNiBogart</title>
    <style>
        .receipt {
            border: 2px solid #000;
            padding: 5px;
            margin-top: 8px;
            width: fit-content;
        }
    </style>
</head>
<body>
    <h2>Menu</h2>
    <form method="POST">
        <table border="1">
            <tr>
                <th>Order</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>Borgir</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Fries</td>
                <td>75</td>
            </tr>
            <tr>
                <td>Steak</td>
                <td>150</td>
            </tr>
        </table>
        <br>
        <label for="order">Select an order:</label>
        <select name="order" id="order">
            <option value="Burger">Borgir</option>
            <option value="Fries">Fries</option>
            <option value="Steak">Steak</option>
        </select>
        <br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1">
        <br><br>
        <label for="cash">Cash:</label>
        <input type="number" name="cash" id="cash">
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        if ($receipt) {
            echo $receipt;
        }
    ?>
</body>
</html>