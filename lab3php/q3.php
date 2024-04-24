<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table in PHP</title>
</head>
<body>
    <?php  
    $info = [ 'name' => 'Amrit Chapagain', 'address' => 'Kawasoti','email' => 'amritchapa@gmail.com', 'phone' => 
    9866140624,'website' =>  'www.amritchapa.com']; ?>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
        </tr>
        <tr>
            <td><?php echo $info['name'];?></td>
            <td><?php echo $info['address'];?></td>
            <td><?php echo $info['email'];?></td>
            <td><?php echo $info['phone'];?></td>
            <td><?php echo $info['website'];?></td>
        </tr>
</table>
</body>
</html>