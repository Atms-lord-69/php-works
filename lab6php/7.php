<?php
$temp =
    "50,60,70,90,42,62,52,87,32,45,75,25,60,61,66,65,57,65,32,45,75,45,45,55,56,57,58,59,60,61,62
,63,64";
$temp_array = explode(',', $temp);
$tot_temp = 0;
$temp_array_length = count($temp_array);
foreach ($temp_array as $temp) {
    $tot_temp += $temp;
}
$avg_high_temp = $tot_temp / $temp_array_length;
echo "Average weight is : " . $avg_high_temp . "";
sort($temp_array);
echo " List of five lowest weight :";
for ($i = 0; $i < 5; $i++) {
    echo $temp_array[$i] . ", ";
}
echo "List of five highest weight :";
for ($i = ($temp_array_length - 5); $i < ($temp_array_length); $i++) {
    echo $temp_array[$i] . ", ";
}
