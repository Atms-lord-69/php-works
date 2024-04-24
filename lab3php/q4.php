<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pass or fail</title>
    <style type="text/css">
        .pass {
            background: #0f0;
        }
        .fail {
            background: #f00;
        }
    </style>
</head>
<body>
    <?php
    $students = [
        [
            'Name' => 'Ayush',
            'Roll' => 42,
            'WEB_TECH_II' => 86,
            'DBMS' => 89,
            'Economics' => 59,
            'DSA' => 70,
            'ACCOUNT' => 89,
        ],
        [
            'Name' => 'Aman',
            'Roll' => 38,
            'WEB_TECH_II' => 68,
            'DBMS' => 98,
            'Economics' => 20,
            'DSA' => 57,
            'ACCOUNT' => 69,
        ],
        [
            'Name' => 'Reshav',
            'Roll' => 54,
            'WEB_TECH_II' => 70,
            'DBMS' => 23,
            'Economics' => 95,
            'DSA' => 50,
            'ACCOUNT' => 90,
        ],
        [
            'Name' => 'Pujan',
            'Roll' => 36,
            'WEB_TECH_II' => 30,
            'DBMS' => 70,
            'Economics' => 80,
            'DSA' => 70,
            'ACCOUNT' => 89,
        ]
    ]
    ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Web Tech II</th>
                <th>DBMS</th>
                <th>Economics</th>
                <th>DSA</th>
                <th>Account</th>
                <th>Total</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $index => $marks) {
                $total = $marks['ACCOUNT'] + $marks['DBMS'] + $marks['DSA'] + $marks['Economics'] + $marks['WEB_TECH_II'];
                $result = ($marks['ACCOUNT'] >= 40 && $marks['DBMS'] >= 40 && $marks['DSA'] >= 40 && $marks['Economics'] >= 40 && $marks['WEB_TECH_II'] >= 40) ? 'pass' : 'fail';
            ?>
                <tr class="<?php echo $result ?>">
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $marks['Name'] ?></td>
                    <td><?php echo $marks['Roll'] ?></td>
                    <td><?php echo $marks['WEB_TECH_II'] ?></td>
                    <td><?php echo $marks['DBMS'] ?></td>
                    <td><?php echo $marks['Economics'] ?></td>
                    <td><?php echo $marks['DSA'] ?></td>
                    <td><?php echo $marks['ACCOUNT'] ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $result; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
