<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM subtasks WHERE id='$id'");
$subtask = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    if (!empty($nama)) {
        $conn->query("UPDATE subtasks SET nama='$nama' WHERE id='$id'");
        header("Location: index.php");
        exit();
    } else {
        echo "Nama subtask tidak boleh kosong!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Subtask</title>
    <link rel="stylesheet" href="css/editsubtasks.css">
</head>
<body>
<div class="container">
    <h2>Edit Subtask</h2>
    <form method="POST">
        <input type="text" name="nama" value="<?= $subtask['nama']; ?>" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">← Kembali ke Beranda</a>
</div>
</body>
</html>
