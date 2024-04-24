<?php
if(isset($_POST['btnuploaad'])){
$error=[];
// Check file size
if ($_FILES["CV"]["size"] > 1*1024*1024) {
    echo "Sorry, your file is too large.";
    $type=['application/pdf','application/docx'];
    if(in_array($_FILES['CV']['type'],$type)){
    $CV_name=uniqued() .'_'. $_FILES['CV']['name'];
    if(move_uploaded_file($FILES['CV']['temp_name'],'CV/'. $CV_name)){
    echo "CV uploaded success";
    } else {
    $error['CV'] = "CV uploaded failed";
    }
    } else {
    $error['CV'] = "CV type not allowed";
    }
} else {
$error['CV'] = "CV size exceed allowed 1MB";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Upload CV</title>
</head>
<body>
<form action="<?php echo $_SERVER ['PHP_SELF']?>" method= "post"
enctype="multipart/form-data">
<input type="file" name= "CV">  
<?php if (isset($error ['CV'])){
echo $error['CV'];
} ?>
<input class="form-control button" type="submit" name="btnuploaad" value="Save">
</form>
</body>
</html>