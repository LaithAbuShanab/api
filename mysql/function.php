<?php

function redirect($path)
{
    header("location: $path");
}

function connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "customer";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    return $conn;
}

function get_users()
{
    $sql = "select * from users";
    $result = mysqli_query(connection(), $sql);

    $customer = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $customer[] = $row;
        }
    }
    return $customer;
}

function get_user($id)
{
    $sql = "SELECT * from users where id=$id";
    $result = mysqli_query(connection(), $sql);
    return mysqli_fetch_assoc($result);
}

function create_user($firstname, $lastname, $email, $phone, $sales)
{
    $connect = connection();
    $sales = !empty($sales) ? (float) $sales : 0;
    $sql = "insert into users (firstname,lastname,email,phone,sales) VALUES ('$firstname','$lastname','$email','$phone',$sales)";
    mysqli_query($connect, $sql);
    $id = $connect->insert_id;
    return $id;
}

function update_user($firstname, $lastname, $email, $phone, $sales, $id)
{
    $connect = connection();
    $sales = !empty($sales) ? (float) $sales : 0;
    $sql = <<<EOD
    UPDATE users
        SET firstname='$firstname',
            lastname='$lastname',
            email ='$email',
            phone='$phone',
            sales=$sales
        WHERE id=$id;
    EOD;
    mysqli_query($connect, $sql);
}

function delete_user($id)
{
    $sql = "delete from users where id=$id";
    mysqli_query(connection(), $sql);
    redirect('./');
}
