<!DOCTYPE html>
<html>

<head>
    <title>Colors</title>
</head>

<body>
    <?php
    $color = array('white', 'green', 'red');
    echo $color[0] . "," . $color[1] . "," . $color[2];
    echo "<br>";
    echo '<ul>';
    foreach ($color as $c) {
        echo '<li>' . $c . '</li>';
    }
    echo '</ul>';
    ?>
</body>

</html>