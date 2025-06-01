<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

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

//<script>alert('XSS')</script>
function insert_person($link, $fullname, $gender, $birthdate, $occupation, $address, $province, $phone)
{
    $stmt = mysqli_prepare($link, "INSERT INTO address (fullname, gender, birthdate, occupation, address, province, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($link));
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $gender, $birthdate, $occupation, $address, $province, $phone);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
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

$query = "SELECT * FROM address ORDER BY id ASC";
$result = execute_query($link, $query);
$persons = mysqli_fetch_all($result, MYSQLI_ASSOC);

require 'address.view.php';
mysqli_close($link);
