<!DOCTYPE html>
<html>
<head>
<title>capital</title>
</head>
<body>
<?php
    $list = array('Nepal'=>'Kathmandu','India'=>'New
    Delhi','Australia'=>'Sydney','Denmark'=>'Copenhagen','Finland'=>'Helsinki','France'=>'Paris','Sl
    ovakia'=>'Bratislava','Netherlands'=>'Amsterdam','Portugal'=>'Lisbon','Spain'=>'Madrid');
    asort($list);
    foreach ($list as $key => $value) {
    echo "The capital of <b>".$key."</b> is <b>".$value."</b>.";
    echo'<br>';
    }
?>
</body>
</html>