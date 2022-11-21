<?php
session_start();
include './function.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST' ||  empty($_POST))
    die('You are trying access directly!');

$email = isset($_POST['email']) ? $_POST['email'] : null;
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$sales = isset($_POST['sales']) ? $_POST['sales'] : null;

$error = false;
$error_msg = '';

if (!empty($email) && !empty($firstname) && !empty($lastname) && !empty($phone)) {
    $id=create_user($firstname, $lastname, $email, $phone, $sales);
} else {
    $error_msg = "Please fill out the required information";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    redirect('./create.php');
} else {
    redirect("./customer.php?id=$id");
    
}
