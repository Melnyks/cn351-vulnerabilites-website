<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person</title>
    <link rel="stylesheet" href="css/address_view.css">
</head>

<body>
    <p>
        ยินดีต้อนรับ, <?= htmlspecialchars($_SESSION['username'] ?? 'ผู้ใช้'); ?> |
        <a href="logout.php" class="btn-logout">ออกจากระบบ</a>
    </p>
    <h1>ข้อมูลที่อยู่ทั้งหมด</h1>
    <a href="create.php" class="add-new">เพิ่มข้อมูลใหม่</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ-นามสกุล</th>
                <th>วันเกิด</th>
                <th>อาชีพ</th>
                <th>จังหวัด</th>
                <th>เบอร์โทรศัพท์</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persons as $person) : ?>
                <tr>
                    <td><?= $person['id']; ?></td>
                    <td><a href="detail.php?id=<?= $person['id']; ?>"><?= $person['fullname']; ?></a></td>
                    <td><?= $person['birthdate'] ?></td>
                    <td><?= $person['occupation'] ?></td>
                    <td><?= $person['province'] ?></td>
                    <td><?= $person['phone'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $person['id']; ?>" class="btn btn-edit">แก้ไข</a>
                        <a href="delete.php?id=<?= $person['id']; ?>" class="btn btn-delete">ลบ</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>