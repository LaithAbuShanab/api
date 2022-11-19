<?php
session_start();
include "./function.php";

$_SESSION['error'] = null;

if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST))
    die("You are a bad guy and you are trying to access this code directly!");

$email = isset($_POST['email_login']) ? $_POST['email_login'] : null;
$password = isset($_POST['password_login']) ? $_POST['password_login'] : null;

$error = false;
$error_msg = '';


$sql = "SELECT * FROM registration";
$result = mysqli_query(connect(), $sql);

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

foreach ($users as $user) {
    if ($email == $user['email']) {
        $valid_user = $user;
        break;
    }
}

if (!empty($valid_user)) {
    if ($password != $valid_user["password"]) {
        $error_msg = "Incorrect email or password";
        $error = true;
    }
} else {
    $error_msg = "Incorrect email or password";
    $error = true;
}


if ($error) {
    $_SESSION['error'] = $error_msg;
    header('location:./');
} else {
    $_SESSION['user'] = $valid_user->fname;
    header('location:./home.php');
}
