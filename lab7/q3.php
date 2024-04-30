<?php
if (isset($_POST['upload'])) {
    $err = [];
    //check error
    if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
        //check size
        if ($_FILES['photo']['size'] <= 102400) {
            //check type
            $types = ['image/png', 'image/jpeg'];
            if (in_array($_FILES['photo']['type'], $types)) {
                if (file_exists('images/' . $_FILES['photo']['name'])) {
                    //generate random file name
                    $file_name = uniqid() . '_' . $_FILES['photo']['name'];
                } else {
                    $file_name = $_FILES['photo']['name'];
                }
                //upload file to server: move to our project folder
                if (move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $file_name)) {
                    echo 'File upload success';
                } else {
                    $err['photo'] = 'File can not move to our folder';
                }
            } else {
                $err['photo'] = 'Invalid file type';
            }
        } else {
            $err['photo'] = 'Large image size';
        }
    } else {
        $err['photo'] = 'File upload error';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>File Upload Example</title>
</head>

<body>
    <h1>File upload</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Photo</label>
        <input type="file" name="photo">
        <?php
        if (isset($err['photo'])) {
            echo $err['photo'];
        }
        ?>
        <br>
        <input type="submit" name="upload" value="Upload File">
    </form>
</body>

</html>