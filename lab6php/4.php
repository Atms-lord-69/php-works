<!DOCTYPE html>
<html>
<head>
<title>Delete</title>
</head>
<body>
<?php
    $x = array(1,2,3,4,5);
    echo "Before Removing: ";
    print_r($x);
    echo '<br>';
    unset($x[1]);
    array_splice($x,1,0);
    echo "After Removing: ";
    print_r($x);
?>
</body>
</html>