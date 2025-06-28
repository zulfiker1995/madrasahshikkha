<!DOCTYPE html>
<h
tml lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>মাদ্রাসাশিক্ষা ডট কম</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php require 'db.php'; ?>
<header class="site-header"> 
  <div class="header-content">
    <img src="assets/logo.jpg" alt="Logo" class="logo" />
    <div class="title-text">
      <h1>মাদ্রাসাশিক্ষা ডট কম</h1>
      <p>আধুনিক মাদ্রাসাশিক্ষা প্ল্যাটফর্ম</p>
    </div>
  </div>
  <div class="social-icons">
    <a href="https://facebook.com" target="_blank"><img src="assets/facebook.png" alt="Facebook"></a>
    <a href="https://youtube.com" target="_blank"><img src="assets/youtube.png" alt="YouTube"></a>
    <a href="https://x.com" target="_blank"><img src="assets/x.png" alt="X"></a>
    <a href="https://linkedin.com" target="_blank"><img src="assets/linkedin.png" alt="LinkedIn"></a>
  </div>
</header>
<div class="menu-container">
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <nav>
        <ul id="main-menu">
            <li><a href="about.html">আমাদের সম্পর্কে</a></li>
            <li><a href="mission.html">লক্ষ্য আর উদ্দেশ্য</a></li>
            <li><a href="ibtedayi.html">শিক্ষার্থী কর্নার</a></li>
            <li><a href="dakhil.html">দাখিল ও মাধ্যমিক শিক্ষা</a></li>
            <li><a href="alim.html">আলিম শিক্ষা</a></li>
            <li><a href="fazil.html">শিক্ষক বাতায়ন</a></li>
            <li><a href="kamil.html">অনলাইন লাইব্রেরি</a></li>
            <li><a href="board-exam.html">বোর্ড পরীক্ষা</a></li>
            <li><a href="result.html">ফলাফল</a></li>
        </ul>
    </nav>
    <marquee behavior="scroll" direction="left">মাদ্রাসাশিক্ষা ডট কম আপনাকে স্বাগতম</marquee>
</div>
<div class="container">
    <div class="left">
        <h3>মাদ্রাসা শিক্ষা অধিপত্তর</h3>
        <p> মাদ্রাসা শিক্ষা অধিপত্তরে প্রকাশিত সর্বশেষ নোটিশ সমূহ </p>
        <ul>
            <li> নতুন ক্লাস রুটিন প্রকাশিত হয়েছে</li>
            <li> অনলাইন ভর্তি শুরু হয়েছে</li>
            <li> রমজান বিশেষ কোর্সের জন্য রেজিস্ট্রেশন করুন</li>
        </ul>
    </div>
    <div class="middle">
        <div id="latestNews">
            <h3> সর্বশেষ পোস্ট</h3>
            <ul>
            <?php
            $latest = $conn->query("SELECT id, title FROM posts ORDER BY created_at DESC LIMIT 10");
            while ($row = $latest->fetch_assoc()): ?>
                <li><?= htmlspecialchars($row['title']) ?></li>
            <?php endwhile; ?>
            </ul>
        </div>
        <?php
        $categories = ['জাতীয়', 'আন্তর্জাতিক', 'শিক্ষা', 'ধর্ম'];
        foreach ($categories as $cat): ?>
        <div class="category-block">
            <h3><?= $cat ?> ক্যাটাগরি</h3>
            <ul>
            <?php
            $stmt = $conn->prepare("SELECT id, title FROM posts WHERE category=? ORDER BY created_at DESC LIMIT 5");
            $stmt->bind_param('s', $cat);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()): ?>
                <li><?= htmlspecialchars($row['title']) ?></li>
            <?php endwhile; $stmt->close(); ?>
            </ul>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="right">
        <h3>গুরুত্বপূর্ণ লিংকসমূহ</h3>
        <ul>
            <li><a href="#">শিক্ষার্থী কর্নার</a></li>
            <li><a href="#">শিক্ষক বাতায়ন</a></li>
            <li><a href="#">অনলাইন লাইব্রেরি</a></li>
        </ul>
    </div>
</div>
<div class="footer1">
    <h2>পরীক্ষা প্রস্তুতি</h2>
    <p>এখানে আপনি ইসলামিক কনটেন্ট, লিংক বা শিক্ষকদের প্রোফাইল দিতে পারেন।</p>
</div>
<footer>
    &copy; 2025 MadrasahShikkha.com | ডিজাইন ও পরিচালনায়: জুলফিকার রহমান জোগায়োগ: 01767792249
</footer>
<script>
function toggleMenu() {
  const menu = document.getElementById("main-menu");
  menu.classList.toggle("show");
}
</script>
</body>
</html>
