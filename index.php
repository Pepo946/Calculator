<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    <title>Calculate</title>
</head>

<body>
<body>
    <div class="calculator">
        <h1> Calculator 🐱</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input type="number" name="num01" placeholder="Enter a number" required>
            <select name="operator">
                <option value="+">➕</option>
                <option value="-">➖</option>
                <option value="*">✖️</option>
                <option value="/">➗</option>
            </select>
            <input type="number" name="num02" placeholder="Enter another number" required>
            <button type="submit">Calculate</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Grab the data from the input fields
            $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
            $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            // Error handler
            $errors = false;
            if (empty($num01) || empty($num02)) {
                echo "<p class='calc-error'>Fill in all fields!</p>";
                $errors = true;
            }
            if (!is_numeric($num01) || !is_numeric($num02)) {
                echo "<p class='calc-error'>Only write Numbers!</p>";
                $errors = true;
            }

            // Calculate the result
            if (!$errors) {
                $result = 0;
                switch ($operator) {
                    case "+":
                        $result = $num01 + $num02;
                        break;
                    case "-":
                        $result = $num01 - $num02;
                        break;
                    case "*":
                        $result = $num01 * $num02;
                        break;
                    case "/":
                        $result = $num01 / $num02;
                        break;
                    default:
                        echo "<p class='calc-error'>Invalid operator!</p>";
                        $errors = true;
                        break;
                }
                if (!$errors) {
                    echo "<p class='calc-result'>Result = " . $result . "</p>";
                }
            }
        }
        ?>
    </div>
</body>

</html>
