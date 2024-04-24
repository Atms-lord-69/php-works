<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "labreport";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_errno != 0) {
    die("Connection error: " . $connection->connect_error);
}

if (isset($_POST['btnupload'])) {
    $err = [];
    
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        $err['id'] = 'Enter id';
    }
    
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $err['name'] = 'Enter name';
    }
    
    if (isset($_POST['rank']) && !empty($_POST['rank'])) {
        $rank = $_POST['rank'];
    } else {
        $err['rank'] = 'Enter rank';
    }
    
    // Error check
    if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
        // Size check
        if ($_FILES['photo']['size'] < 102400) {
            // Type check
            $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
            if (in_array($_FILES['photo']['type'], $type)) {
                // Upload file
                if (move_uploaded_file($_FILES['photo']['tmp_name'], 'photo/' . $_FILES['photo']['name'])) {
                    echo "File uploaded Success";
                } else {
                    echo "File upload Failed";
                }
            } else {
                $err['photo'] = 'file type does not match';
            }
        } else {
            $err['photo'] = 'File type exceeded, 100 kb allowed';
        }
    } else {
        $err['photo'] = 'File cannot upload';
    }
    
    $created_at = date('Y-m-d H:i:s');
    session_start(); // Start the PHP session function
    $created_by = $_SESSION['id'];
    
    if (count($err) == 0) {
        $sql = "INSERT INTO labreport(id, name, rank, status, image, create_by, created_at) VALUES ('$id', '$name', '$rank', '$status', '$image_name', '$created_by', '$created_at')";
        $connection->query($sql);
        if ($connection->affected_rows == 1 && $connection->insert_id > 0) {
            $success = 'Insert success';
        } else {
            $failed = "Insert failed";
        }
    }
}

if (isset($_POST['btnSave'])) {
    $err = [];
    
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name']) != '') {
        $name = $_POST['name'];
    } else {
        $err['name'] = 'Enter name';
    }
    
    if (count($err) == 0) {
        $sql = "INSERT INTO labreport(name) VALUES ('$name')";
        if ($connection->query($sql)) {
            echo "Category created successfully";
        } else {
            die("Category creation failed $connection->error");
        }
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <?php if (isset($err['name'])) { echo $err['name']; } ?>
    <br>
    <label for="rank">Rank</label>
    <input type="text" name="rank" id="rank">
    <?php if (isset($err['rank'])) { echo $err['rank']; } ?>
    <br>
    <label for="status">Status</label>
    <input type="radio" name="status" value="1">Yes
    <input type="radio" name="status" value="0">No
    <?php if (isset($err['status'])) { echo $err['status']; } ?>
    <br>
    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo">
    <?php if (isset($err['photo'])) { echo $err['photo']; } ?>
    <br>
    <label for="create_by">Create By</label>
    <input type="text" name="create_by" id="create_by" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
    <?php if (isset($err['create_by'])) { echo $err['create_by']; } ?>
    <br>
    <label for="created_at">Created At</label>
    <input type="text" name="created_at" id="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
    <?php if (isset($err['created_at'])) { echo $err['created_at']; } ?>
    <br>
    <button type="submit" name="btnSave">Save</button>
    <button type="submit" name="btnupload">Upload</button>
</form>

<?php
$sql = "SELECT id, name, rank, status, image, create_by, created_at FROM labreport ORDER BY name, rank ASC";
$result = $connection->query($sql);
$labreport = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labreport[] = $row;
    }
}
?>

<table border="1">
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Status</th>
            <th>Image</th>
            <th>Create By</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($labreport as $key => $report) { ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $report['name'] ?></td>
                <td><?php echo $report['rank'] ?></td>
                <td><?php echo $report['status'] == 1 ? 'Yes' : 'No'; ?></td>
                <td><?php echo $report['image'] ?></td>
                <td><?php echo $report['create_by'] ?></td>
                <td><?php echo $report['created_at'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
// Close connection
$connection->close();
?>
