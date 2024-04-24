<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Sheet Generator</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Enter Marks</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Student Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="maths">Maths:</label><br>
        <input type="number" id="maths" name="maths" min="0" max="100" required><br><br>
        
        <label for="science">Science:</label><br>
        <input type="number" id="science" name="science" min="0" max="100" required><br><br>
        
        <label for="english">English:</label><br>
        <input type="number" id="english" name="english" min="0" max="100" required><br><br>
        
        <label for="history">History:</label><br>
        <input type="number" id="history" name="history" min="0" max="100" required><br><br>
        
        <input type="submit" name="submit" value="Generate Mark Sheet">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $maths = $_POST['maths'];
        $science = $_POST['science'];
        $english = $_POST['english'];
        $history = $_POST['history'];

        // Calculate total and average marks
        $total_marks = $maths + $science + $english + $history;
        $average_marks = $total_marks / 4;

        // Grade calculation
        if ($average_marks >= 90) {
            $grade = 'A';
        } elseif ($average_marks >= 80) {
            $grade = 'B';       
        } elseif ($average_marks >= 70) {
            $grade = 'C';
        } elseif ($average_marks >= 60) {
            $grade = 'D';
        } else {
            $grade = 'F';
        }

        // Display mark sheet in table form
        echo "<h2>Mark Sheet</h2>";
        echo "<table>";
        echo "<tr><th>Subject</th><th>Marks Obtained</th></tr>";
        echo "<tr><td>Maths</td><td>$maths</td></tr>";
        echo "<tr><td>Science</td><td>$science</td></tr>";
        echo "<tr><td>English</td><td>$english</td></tr>";
        echo "<tr><td>History</td><td>$history</td></tr>";
        echo "<tr><th>Total Marks</th><td>$total_marks</td></tr>";
        echo "<tr><th>Average Marks</th><td>$average_marks</td></tr>";
        echo "<tr><th>Grade</th><td>$grade</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
