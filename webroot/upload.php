<!DOCTYPE html>
<html>
<head>
    <title>Upload File (Insecure)</title>
</head>
<body>
    <h1>Upload File</h1>

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
            echo "<p style='color:green;'>✅ Uploaded to: $destination</p>";
        } else {
            echo "<p style='color:red;'>❌ Failed to upload file.</p>";
        }
    }
    ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select a file to upload:</label><br><br>
        <input type="file" name="file" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
