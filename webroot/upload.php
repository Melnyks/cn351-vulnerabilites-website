<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    <link rel="stylesheet" href="css/create.css">
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 8px 18px;
            cursor: pointer;
            background-color: #3498db;
            color: white;
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .custom-file-upload:hover {
            background-color: #2980b9;
        }

        #fileNameDisplay {
            margin-left: 10px;
            font-style: italic;
            color: #555;
        }

        .to-persons {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #3498db;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            font-family: sans-serif;
        }
    </style>
</head>

<body>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uploadDir = 'uploads/';
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $destination = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // สร้างโฟลเดอร์อัตโนมัติ
        }

        // ❗❗ ไม่มีการตรวจสอบความปลอดภัยใดๆ
        if (move_uploaded_file($fileTmp, $destination)) {
            echo "<p style='color:green;'>✅ อัปโหลดไปยัง $destination</p>";
        } else {
            echo "<p style='color:red;'>❌ อัปโหลดรายงานไม่สำเร็จ</p>";
        }
    }
?>

<div class="container">
    <a href="index.php" class="to-persons">← กลับไปหน้าหลัก</a>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h1>อัปโหลดไฟล์รายงาน</h1><br>
        <label class="custom-file-upload">
            <input type="file" name="file" id="fileInput" required />
            เลือกไฟล์
        </label>
        <span id="fileNameDisplay">ยังไม่ได้เลือกไฟล์</span><br><br>

        <input type="submit" value="อัปโหลด" class="btn btn-save" style="background-color: #2ecc71;">
    </form>
</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const fileNameDisplay = document.getElementById('fileNameDisplay');

    fileInput.addEventListener('change', function () {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = 'ยังไม่ได้เลือกไฟล์';
        }
    });
</script>

</body>
</html>
