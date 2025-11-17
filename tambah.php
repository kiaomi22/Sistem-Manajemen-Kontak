<?php
require "data.php";

$nama = $email = $telepon = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nama"])) {
        $errors["nama"] = "Nama wajib diisi.";
    } else {
        $nama = trim($_POST["nama"]);
    }

    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email tidak valid.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty($_POST["telepon"]) || !is_numeric($_POST["telepon"])) {
        $errors["telepon"] = "Nomor telepon wajib angka.";
    } else {
        $telepon = trim($_POST["telepon"]);
    }

    if (!$errors) {
        $_SESSION["kontak"][] = [
            "nama" => $nama,
            "email" => $email,
            "telepon" => $telepon
        ];
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Tambah Kontak</h2>

    <form method="POST">

        <label class="font-semibold">Nama:</label>
        <input name="nama" value="<?= $nama ?>" class="w-full border p-2 rounded mb-1">
        <?php if (isset($errors["nama"])) echo "<p class='text-red-500 text-sm'>{$errors['nama']}</p>"; ?>

        <label class="font-semibold">Email:</label>
        <input name="email" value="<?= $email ?>" class="w-full border p-2 rounded mb-1">
        <?php if (isset($errors["email"])) echo "<p class='text-red-500 text-sm'>{$errors['email']}</p>"; ?>

        <label class="font-semibold">Telepon:</label>
        <input name="telepon" value="<?= $telepon ?>" class="w-full border p-2 rounded mb-1">
        <?php if (isset($errors["telepon"])) echo "<p class='text-red-500 text-sm'>{$errors['telepon']}</p>"; ?>

        <button class="bg-blue-600 text-white w-full p-2 rounded mt-4">
            Simpan
        </button>
    </form>
</div>

</body>
</html>
