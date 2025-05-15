<?php
$link = require_once 'db_connect.inc.php';

$id = $_GET["id"];
$query = "SELECT * FROM address WHERE id = $id";
try {
    $result = mysqli_query($link, $query);
    $person = mysqli_fetch_assoc($result);
} catch (mysqli_sql_exception $e) {
    error_log($e);
    die("Failed to delete person : " . $e->getMessage());
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete person</title>
    <link rel="stylesheet" href="css/delete.css">
</head>

<body>
    <div class="container">
        <h1>ลบข้อมูล</h1>
        <a href="index.php" class="to-persons">← กลับไปหน้าหลัก</a>
        <div class="content">
            <div class="image-danger">
                <img src="./danger.svg" alt="danger">
            </div>
            <h2>ยืนยันการลบข้อมูล</h2>
            <p class="text-warn1">คุณกำลังจะลบข้อมูลต่อไปนี้ออกจากระบบ</p>
            <p class="text-warn2">การดำเนินการนี้ไม่สามารถย้อนกลับได้</p>
            <div class="person-info">
                <p><span class="font-bold">ชื่อ-นามสกุล: </span><?= $person['fullname'] ?></p>
                <p><span class="font-bold">เพศ: </span><?= $person['gender'] ?></p>
                <p><span class="font-bold">วันเกิด: </span><?= $person['birthdate'] ?></p>
                <p><span class="font-bold">อาชีพ: </span><?= $person['occupation'] ?></p>
                <p><span class="font-bold">จังหวัด: </span><?= $person['province'] ?></p>
            </div>
            <div class="button-group">
                <form action="index.php" method="post">
                    <input type="hidden" name="delete" value="<?= $person['id']; ?>">
                    <button type="submit" class="btn btn-delete">ยืนยันการลบ</button>
                    <a href="index.php" class="btn btn-cancel">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>