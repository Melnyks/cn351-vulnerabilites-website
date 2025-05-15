<?php

$link = require_once 'db_connect.inc.php';

function execute_query($link, $query)
{
    try {
        $result = mysqli_query($link, $query);
        return $result;
    } catch (mysqli_sql_exception $e) {
        error_log($e);
        die("Database query error : " . $e->getMessage());
    }
}


function insert_person($link, $fullname, $gender, $birthdate, $occupation, $address, $province, $phone)
{
    $query = "INSERT INTO address (fullname,gender,birthdate, occupation,address, province, phone) VALUES ('$fullname','$gender','$birthdate', '$occupation','$address',' $province', '$phone')";
    return execute_query($link, $query);
}

function delete_person($link, $id)
{
    $query = "DELETE FROM address WHERE id = $id";
    return execute_query($link, $query);
}

function update_person($link, $id, $fullname, $gender, $birthdate, $occupation, $address, $province, $phone)
{
    $query = "UPDATE address SET fullname='$fullname',gender='$gender',birthdate='$birthdate', occupation='$occupation',address='$address', province='$province', phone='$phone' WHERE id = $id";
    return execute_query($link, $query);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $occupation = $_POST["occupation"];
    $address = $_POST["address"];
    $province = $_POST["province"];
    $phone = $_POST["phone"];
    insert_person($link, $fullname, $gender, $birthdate, $occupation, $address, $province, $phone);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["delete"];
    delete_person($link, $id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["update"];
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $occupation = $_POST["occupation"];
    $address = $_POST["address"];
    $province = $_POST["province"];
    $phone = $_POST["phone"];
    update_person($link, $id, $fullname, $gender, $birthdate, $occupation, $address, $province, $phone);
}

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once 'db_connect.inc.php';

$query = "SELECT * FROM address ORDER BY id DESC";
$result = execute_query($link, $query);
$persons = mysqli_fetch_all($result, MYSQLI_ASSOC);

require 'address.view.php';
mysqli_close($link);
