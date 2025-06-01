<?php

$link = require_once "db_connect.inc.php";

$id = $_GET["id"];
$query = "SELECT * FROM address WHERE id=$id";
try {
    $result = mysqli_query($link, $query);
    $person = mysqli_fetch_assoc($result);
} catch (mysqli_sql_exception $e) {
    error_log($e);
    die("Failed to update person: " . $e->getMessage());
}

mysqli_close($link);

$provinces = [
    "กระบี่",
    "กรุงเทพมหานคร",
    "กาญจนบุรี",
    "กาฬสินธุ์",
    "กำแพงเพชร",
    "ขอนแก่น",
    "จันทบุรี",
    "ฉะเชิงเทรา",
    "ชลบุรี",
    "ชัยนาท",
    "ชัยภูมิ",
    "ชุมพร",
    "เชียงราย",
    "เชียงใหม่",
    "ตรัง",
    "ตราด",
    "ตาก",
    "นครนายก",
    "นครปฐม",
    "นครพนม",
    "นครราชสีมา",
    "นครศรีธรรมราช",
    "นครสวรรค์",
    "นนทบุรี",
    "นราธิวาส",
    "น่าน",
    "บึงกาฬ",
    "บุรีรัมย์",
    "ปทุมธานี",
    "ประจวบคีรีขันธ์",
    "ปราจีนบุรี",
    "ปัตตานี",
    "พระนครศรีอยุธยา",
    "พะเยา",
    "พังงา",
    "พัทลุง",
    "พิจิตร",
    "พิษณุโลก",
    "เพชรบุรี",
    "เพชรบูรณ์",
    "แพร่",
    "ภูเก็ต",
    "มหาสารคาม",
    "มุกดาหาร",
    "แม่ฮ่องสอน",
    "ยโสธร",
    "ยะลา",
    "ร้อยเอ็ด",
    "ระนอง",
    "ระยอง",
    "ราชบุรี",
    "ลพบุรี",
    "ลำปาง",
    "ลำพูน",
    "เลย",
    "ศรีสะเกษ",
    "สกลนคร",
    "สงขลา",
    "สตูล",
    "สมุทรปราการ",
    "สมุทรสงคราม",
    "สมุทรสาคร",
    "สระแก้ว",
    "สระบุรี",
    "สิงห์บุรี",
    "สุโขทัย",
    "สุพรรณบุรี",
    "สุราษฎร์ธานี",
    "สุรินทร์",
    "หนองคาย",
    "หนองบัวลำภู",
    "อ่างทอง",
    "อุดรธานี",
    "อุทัยธานี",
    "อุตรดิตถ์",
    "อุบลราชธานี",
    "อำนาจเจริญ"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit person detail</title>
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <div class="container">
        <h1>แก้ไขข้อมูลส่วนตัว</h1>
        <a href="index.php" class="to-persons">← กลับไปหน้าหลัก</a>
        <div class="form">
            <form action="index.php" method="post">
                <input type="hidden" name="update" value="<?= $person['id']; ?>">
                <div class="input-group">
                    <label for="fullname">ชื่อ-นามสกุล</label>
                    <input type="text" id="fullname" name="fullname" value="<?= $person['fullname']; ?>" required>
                </div>
                <br>
                <div class="input-group-radio">
                    <label class="gender">เพศ</label>
                    <input type="radio" id="male" name="gender" value="ชาย"
                        <?= ($person['gender'] === 'ชาย') ? 'checked' : '' ?> required>
                    <label for="male">ชาย</label>
                    <input type="radio" id="female" name="gender" value="หญิง"
                        <?= ($person['gender'] === 'หญิง') ? 'checked' : '' ?> required>
                    <label for="female">หญิง</label>
                </div>

                <br>
                <div class="input-group">
                    <label for="birthdate">วัน/เดือน/ปีเกิด</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?= $person['birthdate']; ?>" required placeholder="dd/mm/yyyy">
                </div>
                <br>
                <div class="input-group">
                    <label for="occupation">อาชีพ</label>
                    <select name="occupation" required>
                        <option value="" disabled <?= empty($person['occupation']) ? 'selected' : '' ?>>-- เลือกอาชีพ --</option>
                        <option value="นักศึกษา" <?= $person['occupation'] === 'นักศึกษา' ? 'selected' : '' ?>>นักศึกษา</option>
                        <option value="พนักงานบริษัท" <?= $person['occupation'] === 'พนักงานบริษัท' ? 'selected' : '' ?>>พนักงานบริษัท</option>
                        <option value="รับราชการ" <?= $person['occupation'] === 'รับราชการ' ? 'selected' : '' ?>>รับราชการ</option>
                        <option value="ธุรกิจส่วนตัว" <?= $person['occupation'] === 'ธุรกิจส่วนตัว' ? 'selected' : '' ?>>ธุรกิจส่วนตัว</option>
                        <option value="อื่น ๆ" <?= $person['occupation'] === 'อื่น ๆ' ? 'selected' : '' ?>>อื่น ๆ</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <label for="address">ที่อยู่(ตามบัตรประชาชน)</label>
                    <textarea name="address" id="address"><?= htmlspecialchars($person['address']) ?></textarea>
                </div>

                <br>
                <div class="input-group">
                    <label for="province">จังหวัด</label>
                    <select name="province" required>
                        <option value="" disabled>-- เลือกจังหวัด --</option>
                        <?php foreach ($provinces as $province): ?>
                            <option value="<?= $province ?>" <?= ($person['province']) === $province ? 'selected' : '' ?>>
                                <?= $province ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <label for="phone">โทร</label>
                    <input type="tel" id="phone" name="phone" value="<?= $person['phone']; ?>" required>
                </div>
                <br>
                <div class="button-group">
                    <button type="submit" class="btn btn-save">บันทึกการแก้ไข</button>
                    <a href="index.php" class="btn btn-clear">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>