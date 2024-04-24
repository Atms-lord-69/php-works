<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<pre>
<?php
function array_change_value_case($input, $ucase)
{
$case = $ucase;
$narray = array();
if (!is_array($input))
{
    return $narray;
}
foreach ($input as $key => $value)
{
if (is_array($value))
{
$narray[$key] = array_change_value_case($value, $case);
continue;
}
$narray[$key] = ($case == CASE_UPPER ? strtoupper($value) : strtolower($value));
}
return $narray;
}
$brand = array('A' => 'Apple', 'B' => 'Bird', 'c' => 'Carbon');
echo 'Actual array ';
print_r($brand);
echo 'Values are in lower case.';
$mybrand = array_change_value_case($brand,CASE_LOWER);
print_r($mybrand);
echo 'Values are in upper case.';
$mybrand = array_change_value_case($brand,CASE_UPPER);
print_r($mybrand);
?>

</pre>

</body>
</html>