<?php
require 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $details = $_POST['details'] ?? '';
    $category = $_POST['category'] ?? '';
    $tags = $_POST['tags'] ?? '';

    // File upload
    $fileName = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $uploadDir = 'upload/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $fileName = basename($_FILES['file']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Move uploaded file
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            $message = "ফাইল আপলোড ব্যর্থ হয়েছে।";
        }
    }

    if (!$message) {
        $stmt = $conn->prepare("INSERT INTO posts (title, details, file, category, tags) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $title, $details, $fileName, $category, $tags);
        if ($stmt->execute()) {
            $message = "পোস্ট সফলভাবে যোগ করা হয়েছে।";
        } else {
            $message = "ডাটাবেজ ত্রুটি: " . $conn->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8" />
<title>ড্যাশবোর্ড - পোস্ট যুক্ত করুন</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h2>নতুন পোস্ট যুক্ত করুন</h2>
<?php if($message): ?>
<p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>
<form method="post" enctype="multipart/form-data">
    <label>শিরোনাম:<br><input type="text" name="title" required></label><br><br>
    <label>বিস্তারিত:<br><textarea name="details" rows="6" required></textarea></label><br><br>
    <label>ক্যাটাগরি:<br>
        <select name="category" required>
            <option value="">-- নির্বাচন করুন --</option>
            <option value="জাতীয়">জাতীয়</option>
            <option value="আন্তর্জাতিক">আন্তর্জাতিক</option>
            <option value="শিক্ষা">শিক্ষা</option>
            <option value="ধর্ম">ধর্ম</option>
        </select>
    </label><br><br>
    <label>ট্যাগ:<br><input type="text" name="tags" placeholder="কমা দিয়ে আলাদা করুন"></label><br><br>
    <label>ফাইল যুক্ত করুন:<br><input type="file" name="file" accept=".pdf,.jpg,.png,.doc,.docx"></label><br><br>
    <button type="submit">পোস্ট সংরক্ষণ করুন</button>
</form>
</body>
</html>
