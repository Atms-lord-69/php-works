<!DOCTYPE html>
<html>
<head>
<title>Sort</title>
</head>
<body>
<?php
    $sort = array('Ram'=>'31','Hari'=>'41','Sita'=>'39','Gita'=>'40');
    asort($sort);
    echo "Ascending order sort by value: ";
    echo "<br>";
    foreach($sort as $key => $value)
    {
    echo $value."<br>";
    }
    echo "Ascending order sort by key: "."<br>";
    ksort($sort);
    foreach($sort as $key => $value)
    {
    echo $key."<br>";
    }
    arsort($sort);
    echo "Descending order sort by value: "."<br>";
    foreach($sort as $key => $value)
    {
    echo $value."<br>";
    }
    krsort($sort);
    echo "Descending order sort by key: "."<br>";
    foreach($sort as $key => $value)
    {
    echo $key."<br>";
    }

?>
</body>
</html>