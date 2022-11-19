<?php
session_start();
include "./function.php";

if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

$firstname = isset($_POST['fname']) ? $_POST['fname'] : null;
$lastname = isset($_POST['lname']) ? $_POST['lname'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;

$error = false;
$error_msg = '';


if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($phone)) {
    $new_customer_id = create_user($firstname, $lastname, $email, $password, $phone,);
    header('location:./');
}
