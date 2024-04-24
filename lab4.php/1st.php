<?php
if (isset($_COOKIE['remember']) && $_COOKIE['remember'] == 1){
    session_start();
    $_SESSION['email'] = $_COOKIE['email'];
    header('location:dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form using session & cookies</title>
</head>
<body>
<h1>Login Form</h1>
<?php
$error = [];
if(isset($_POST['btnlogin'])) {
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $error['email'] = 'Enter email';
    }
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $error['password'] = 'Enter password';
    }
    if (count($error) == 0) {
        $USERS = [
            ['email' => 'amritchapagain@gmail.com', 'password' => 'admin123'],
            ['email' => 'amritchapagain@gmail.com', 'password' => '123']
        ];
        $login = false;
        foreach ($USERS as $user) {
            if ($email == $user['email'] && $password == $user['password']) {
                $login = true;
                break;
            }
        }
        if($login) {
            session_start();
            $_SESSION['email'] = $email;
            if (isset($_POST['remember'])) {
                setcookie('remember', 1, time()+7*24*60*60);
                setcookie('email', $email, time()+7*24*60*60);
            }
            header("location:dashboard.php");
            exit;
        } else {
            echo "Login failed";
        }
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <?php if (isset($error['email'])) { echo $error['email']; } ?><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <?php if (isset($error['password'])) { echo $error['password']; } ?><br>
    <input type="checkbox" name="remember" value="remember"> Remember me for 2 days<br>
    <input type="submit" name="btnlogin" value="Login">
</form>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
    exit;
}
?>

