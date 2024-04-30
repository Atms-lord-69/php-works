<!DOCTYPE html>
<html>

<head>
    <title>Tax Calculation</title>
</head>

<body>
    <?php
    $income = 1000000;
    $marital_status = 'unmarried';
    $gender = 'male';
    if ($marital_status == 'married') {
        if ($income >= 0 && $income <= 450000) {
            $tax = $income * 0.01;
        } else if ($income > 450000 && $income <= 550000) {
            $tax = 4500 + ($income - 450000) * 0.1;
        } else if ($income > 550000 && $income <= 750000) {
            $tax = 4500 + 10000 + ($income - 550000) * 0.2;
        } else if ($income > 750000 && $income <= 2000000) {
            $tax = 4500 + 10000 + 40000 + ($income - 750000) * 0.3;
        } else {
            $tax = 4500 + 10000 + 40000 + 375000 + ($income - 2000000) * 0.36;
        }
    } else {
        if ($income >= 0 && $income <= 400000) {
            $tax = $income * 0.01;
        } else if ($income > 400000 && $income <= 500000) {
            $tax = 4000 + ($income - 400000) * 0.1;
        } else if ($income > 500000 && $income <= 700000) {
            $tax = 4000 + 10000 + ($income - 500000) * 0.2;
        } else if ($income > 700000 && $income <= 2000000) {
            $tax = 4500 + 10000 + 40000 + ($income - 700000) * 0.3;
        } else {
            $tax = 4500 + 10000 + 40000 + 390000 + ($income - 2000000) * 0.36;
        }
    }
    if ($gender == 'female') {
        $tax = $tax - ($tax * 0.1);
    }
    echo 'Final tax amount is ' . $tax;
    ?>
</body>