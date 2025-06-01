<?php
$link = require_once 'db_connect.inc.php';

$id = $_GET["id"];
$query = "SELECT * FROM address WHERE id = $id";
try {
    $result = mysqli_query($link, $query);
    $person = mysqli_fetch_assoc($result);
} catch (mysqli_sql_exception $e) {
    error_log($e);
    die("Failed to get person detail : " . $e->getMessage());
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person detail</title>
    <link rel="stylesheet" href="css/detail.css">
</head>

<body>
    <div class="container">
        <a href="index.php" class="to-persons">← กลับไปหน้าหลัก</a>
        <h1><?= $person['fullname'] ?></h1>
        <p class="id">รหัส: <?= $person['id'] ?></p>
        <div class="content">
            <table>
                <tr>
                    <th>วันเกิด</th>
                    <td><?= $person['birthdate'] ?></td>
                </tr>
                <tr>
                    <th>เพศ</th>
                    <td><?= $person['gender'] ?></td>
                </tr>
                <tr>
                    <th>อาชีพ</th>
                    <td><?= $person['occupation'] ?></td>
                </tr>
                <tr>
                    <th>จังหวัด</th>
                    <td><?= $person['province'] ?></td>
                </tr>
                <tr>
                    <th>ที่อยู่</th>
                    <td><?= $person['address'] ?></td>
                </tr>
                <tr>
                    <th>เบอร์โทรศัพท์</th>
                    <td><?= $person['phone'] ?></td>
                </tr>
            </table>
        </div>
        <div class="button-group">
            <a href="index.php" class="btn btn-back">กลับไปหน้าหลัก</a>
            <a href="edit.php?id=<?= $person['id']; ?>" class="btn btn-edit">แก้ไขข้อมูล</a>
        </div>
    </div>
</body>

</html>