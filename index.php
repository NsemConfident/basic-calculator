<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>basic calculator</title>
</head>
<body>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="number" name="num01" placeholder="number one" required>
    <select name="operators" id="">
        <option value="add">+</option>
        <option value="sutract">-</option>
        <option value="multiply">x</option>
        <option value="divide">/</option>
    </select>
    <input type="number" name="num02" placeholder="number two" required>
    <button style="background-color: red">calculator</button>
</form>

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // grab data from inputs    

    $num1 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
    $num2 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
    $operator = htmlspecialchars($_POST["operators"]);

    // Error handlers 

    $errors = false;
    if(empty($num1) || empty($num2) || empty($operator)){

        echo "<p class='calc-error'>make sure the fields are filled</p>";
        $errors = true;

    }

    if(!(is_numeric($num1))||!(is_numeric($num2))){

        echo "<p class='calc-error'>make sure they are intergers</p>";
        $errors = true;

    }

    if(!$errors){
        $result = 0;
        switch($operator){
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "divide":
                $result = $num1 / $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            default:
                echo "<p class='calc-error'>something went wrong</p>";
            
        }

        echo "<p class='calc-result'> Result = " . (string)$result . "</p>";
    }
}

?>
    
</body>
</html>