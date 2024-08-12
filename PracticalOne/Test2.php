<!DOCTYPE html>
<html>
<head>
      <title>Maths Operations</title>     
      <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <?php
    $input1 = ""; 
    $input2 = "";
    $operation = "";
    $error = "";
    $result = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["input1"]) || empty($_POST["input2"])) {
            $error = "Both input fields are required.";
        } else {
            $input1 = $_POST["input1"];
            $input2 = $_POST["input2"];
            $operation = $_POST["operation"];

            if (!is_numeric($input1) || !is_numeric($input2))
             {
                $error = "Both inputs must be numeric.";
             } 
             else {
                $input1 = floatval($input1);
                $input2 = floatval($input2);

                switch ($operation) {
                    case "Summation":
                        $result = "Summation: " . ($input1 + $input2);
                        break;
                    case "Subtraction":
                        $result = "Subtraction: " . ($input1 - $input2);
                        break;
                    case "Multiplication":
                        $result = "Multiplication: " . ($input1 * $input2);
                        break;
                    case "Division":
                        if ($input2 != 0) {
                            $result = "Division: " . ($input1 / $input2);
                        } else {
                            $result = "Division by zero is not allowed.";
                        }
                        break;
                    case "ALL ABOVE":
                        $result = "Summation: " . ($input1 + $input2) . "<br>";
                        $result .= "Subtraction: " . ($input1 - $input2) . "<br>";
                        $result .= "Multiplication: " . ($input1 * $input2) . "<br>";
                        if ($input2 != 0) {
                            $result .= "Division: " . ($input1 / $input2);
                        } else {
                            $result .= "Division by zero is not allowed.";
                        }
                        break;
                    default:
                        $error = "Please select atleast one operation.";
                }
            }
        }
    }
    ?>

<div id="form">
<h2>Maths Operations</h2>
    <form method="post" action="">       
        Input 1: <input type="number" min="1" name="input1" value="<?php echo $input1; ?>"><br><br>
        Input 2: <input type="number" min="1" name="input2" value="<?php echo $input2; ?>"><br><br>
        Operation:
        <select name="operation" id="operation" style="padding: 4px; width:145px;">
            <option value="">Select</option>
            <option value="Summation"  <?php echo ($operation == 'Summation') ? 'selected' : ''; ?>>Summation</option>
            <option value="Subtraction"  <?php echo ($operation == 'Subtraction') ? 'selected' : ''; ?>>Subtraction</option>
            <option value="Multiplication"  <?php echo ($operation == 'Multiplication') ? 'selected' : ''; ?>>Multiplication</option>
            <option value="Division"  <?php echo ($operation == 'Division') ? 'selected' : ''; ?>>Division</option>
            <option value="ALL ABOVE"  <?php echo ($operation == 'ALL ABOVE') ? 'selected' : ''; ?>>ALL Above</option>
        </select><br><br>
        <input type="submit" id="btn" value="Submit">
    </form>
    <?php
    if (!empty($error)) {
        echo "<p style='color: red;'>$error</p>";
    } elseif (!empty($result)) {
        echo "<p style='color: green;'>$result</p>";
    }
    ?>
</div>
       
</body>
</html>
