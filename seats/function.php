<?php

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // var_dump($conn);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}


function create_user($firstname, $lastname, $email, $password, $phone,)
{
    $connection = connect();
    $sql = "INSERT INTO registration (fname, lname, email,password, phone) VALUES ('$firstname', '$lastname', '$email','$password', '$phone')";
    $result = mysqli_query($connection, $sql);
}


function get_user()
{
    $sql = "SELECT * FROM registration";
    $result = mysqli_query(connect(), $sql);

    $user = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user[] = $row;
        }
    }
    return $user;
}
