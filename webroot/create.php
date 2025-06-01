<?php

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
    <title>Add a new person</title>
    <link rel="stylesheet" href="css/create.css">
</head>

<body>
    <div class="container">
        <h1>เพิ่มข้อมูลที่อยู่ใหม่</h1>
        <a href="index.php" class="to-persons">← กลับไปหน้าหลัก</a>
        <div class="form">
            <form action="index.php" method="post">
                <input type="hidden" name="add" value="1">
                <div class="input-group">
                    <label for="fullname">ชื่อ-นามสกุล</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <br>
                <div class="input-group-radio">
                    <label class="gender">เพศ</label>
                    <input type="radio" id="male" name="gender" value="ชาย" required>
                    <label for="male">ชาย</label>
                    <input type="radio" id="female" name="gender" value="หญิง" required>
                    <label for="female">หญิง</label>
                </div>
                <br>
                <div class="input-group">
                    <label for="birthdate">วัน/เดือน/ปีเกิด</label>
                    <input type="date" id="birthdate" name="birthdate" required placeholder="dd/mm/yyyy">
                </div>
                <br>
                <div class="input-group">
                    <label for="occupation">อาชีพ</label>
                    <select name="occupation" required>
                        <option value="" disabled selected>-- เลือกอาชีพ --</option>
                        <option value="นักศึกษา">นักศึกษา</option>
                        <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                        <option value="รับราชการ">รับราชการ</option>
                        <option value="ธุรกิจส่วนตัว">ธุรกิจส่วนตัว</option>
                        <option value="อื่น ๆ">อื่น ๆ</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <label for="address">ที่อยู่(ตามบัตรประชาชน)</label>
                    <textarea name="address" id="address"></textarea>
                </div>
                <br>
                <div class="input-group">
                    <label for="province">จังหวัด</label>
                    <select name="province" required>
                        <option value="" disabled selected>-- เลือกจังหวัด --</option>
                        <?php foreach ($provinces as $province) : ?>
                            <option value="<?= $province ?>"><?= $province ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <label for="phone">โทร</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <br>
                <div class="button-group">
                    <button type="submit" class="btn btn-save">บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-clear">ล้างข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>