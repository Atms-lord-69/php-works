<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <?php
    $n = range(11, 20);
    shuffle($n);
    for ($x = 0; $x < 10; $x++) {
        echo $n[$x] . ' ';
    }
    echo "\n"
    ?>
</body>

</html>