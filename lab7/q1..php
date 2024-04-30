<!DOCTYPE html>
<html>

<head>
    <title>Simple Interest</title>
    <style>
        label {
            display: table-cell;
            text-align: justify;
        }

        input {
            display: table-cell;
        }

        div.row {
            display: table-row;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <div class="row">
            <label>Principal:</label>
            <input type="number" name="principal" value="" placeholder="Enter principal">
        </div>
        <div class="row">
            <label>Time:</label>
            <input type="number" name="time" value="" placeholder="Enter time">
        </div>
        <div class="row">
            <label>Rate of Interest:</label>
            <input type="number" name="rate" value="" placeholder="Enter rate">
        </div>
        <div class="row">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $p = $_POST['principal'];
        $t = $_POST['time'];
        $r = $_POST['rate'];
        //Simple Interest formula
        $SI = ($p * $t * $r) / 100;
        echo "Simple Interest = " . $SI;
    }
    ?>
</body>

</html>