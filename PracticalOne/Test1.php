<!DOCTYPE html>
<html>
<head>
    <title>Print Numbers(1 to 100)</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

<div id="form">
    <h2>Print Numbers</h2>
    <form method="post" action="">
        <label for="number">Enter Number:</label>
       
        <input type="number" id="number" name="number" min="1" required>
       
        <br><br>
        <input type="submit"  id="btn"  value="Submit">
    </form>

    <p style="overflow-wrap:break-word">
    <?php
        $number="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = intval($_POST['number']);
            
            function printNumbers($start, $end) {
                if ($start <= $end) {
                    if($start == $end)
                    {
                        echo $start; 
                    }
                    else{
                        echo $start . ",";                    
                    }
                   
                    $nextno = $start + 1;
                    printNumbers($nextno, $end);
                }
            }

            printNumbers(1, $number);
        }
        ?>
    </p>
</div>

</body>
</html>
