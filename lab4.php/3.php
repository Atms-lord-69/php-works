<!DOCTYPE html>
<html>
<head>
<title>validate and register</title>
</head>
<body>
<?php
if (isset($_POST['enterbutton'])){
$username= $_POST['username'];
$phone= $_POST['phone'];
$usernamelength= strlen($username);
$phonelength= strlen($phone);
if ($usernamelength < 8){
$output= "<br><redtext> Invalid username. Username must be at least 8
characters</redtext>";}
if ($phonelength != 10){
    $output2= "<br><redtext> Invalid Number</redtext>";}}

?>
<form action="" method="POST">
Please create a username:
<input type="text" name="username" value='' required/>
<?php
if (isset($output)) {
echo $output;}

?>
<br>
Please create a email:
<input type="email" name="email" value='' required />
<br>
Please create a Date of Birth:
<input type="date" name="date" value='' required/>
<br>
Please create a phone:
<input type="phone" name="phone" value='' required />
<?php
if (isset($output2)) {
echo $output2;}
?>
<br><input type="submit" name="enterbutton" value="Enter"/><br>

</form>
</body>
</html>