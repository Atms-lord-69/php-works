<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "labreport";
//create connection
$connection = new mysqli($servername, $username, $password, $database);
//check connection
if ($connection->connect_errno != 0) {
    die("Connection error:" . $connection->connect_error);
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
    // err check
    if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
        // size check
        if ($_FILES['photo']['size'] < 102400) {
            // type check
            $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
            if (in_array($_FILES['photo']['type'], $type)) {
                // upload file
                if (move_uploaded_file($_FILES['photo']['temp_name'], 'photo/'

                    . $_FILES['photo']['name'])) {

                    echo "File uploaded Success";
                } else {
                    echo "File upload Failed";
                }
            } else {
                $err['photo'] = 'file type does not match';
            }
        } else {
            $err['photo'] = 'File type exiceed , 100 kb allowed';
        }
    } else {
        $err['photo'] = 'File cannot upload';
    }
    $created_at = date('Y-M-D H:I:S');
    session_start(); // start the php session function
    $created_by = $_SESSION['id'];
    if (count($error) == 0) {
        $sql = "insert into labreport(id, name, rank, status, image, create_by,created_at) values
('$id','name','$rank','$status','$image_name','$created_by','$created_at')";
        $connect->query($sql);
        if ($connection->affected_rows == 1 && $connect->insert_id > 0) {
            $success = 'Insert sucess';
        } else {
            $failed = "Insert failed";
        }
    }
}
?>
<?php
require_once "Lab5.q1.php";
//check button click/ form submission
if (isset($_POST['btnSave'])) {
    //create blank array to store form error
    $err = [];
    //check empty and trim data(remove space) for name
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name']) != '') {
        //fetch name form $_POST array and save into variable
        $name = $_POST['name'];
    } else {
        //store error message into $err array
        $err['name'] = 'Enter name';
    }
    //count no of error into form
    if (count($err) == 0) {
        //include database connection
        require_once "Lab5.q1.php";
        //sql query to insert data into database taken from form
        $sql = "INSERT INTO $labreport(name) VALUES ('$name')";
        //execute query
        if ($connection->query($sql)) {
            echo "Category created successfully";
        } else {
            die("Category creation failed $connection->error");
        }
        //connection close
        $connection->close();
    }
}
?>
<form action="" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <?php
    if (isset($err['name'])) {
        echo $err['name'];
    }
    ?>
    <br>
    <label for="rank">rank</label>
    <input type="text" name="rank" id="rank">
    <?php
    if (isset($err['rank'])) {
        echo $err['rank'];
    }
    ?>
    <label for="status">status</label>
    <input type="radiobut" name="status" id="status">
    <?php
    if (isset($err['status'])) {
        echo $err['status'];
    }
    ?>
    <br>
    <label for="image">image</label>
    <input type="text" name="image" id="image">
    <?php
    if (isset($err['image'])) {
        echo $err['image'];
    }
    ?>
    <br>
    <label for="create_by">create_by</label>
    <input type="text" create_by="create_by" id="create_by">
    <?php
    if (isset($err['create_by'])) {
        echo $err['create_by'];
    }
    ?>
    <br>

    <label for="created_at">created_at</label>
    <input type="text" name="created_at" id="created_at">
    <?php
    if (isset($err['created_at'])) {
        echo $err['created_at'];
    }
    ?>
    <br>
    <button type="submit" name="btnSave">Save</button>
</form>
?>
<?php
require_once "Lab5.q1.php";
// $sql = "SELECT * FROM labreport";
$sql = "SELECT l.id,l.name,l.rank,l.status,l.image,l.create_by,l.created_at FROM labreport l
ORDER BY l.name,l.rank asc ";
$result = $connection->query($sql);
$labreport = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($labreport, $row);
    }
}
echo '<pre>';
print_r($labreport);
?>
<table border="1">
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>rank</th>
            <th>status</th>
            <th>Image</th>
            <th>create_by</th>
            <th>created_at</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($labreport as $key => $labreport) { ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $labreport['name'] ?></td>
                <td><?php echo $labreport['rank'] ?></td>
                <td>
                    <?php if ($labreport['name'] == 1) {
                        echo 'Yes';
                    } else {
                        echo 'No';
                    } ?>
                </td>
                <td><?php echo $labreport['rank'] ?></td>
                <td>
                    <a href="Lab5.q1.php?id=<?php echo $labreport['id'] ?>" onclick="return

confirm('are you sure to delete')">Delete</a>

                    <a href="Lab5.q1.php?id=<?php echo $labreport['id'] ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>