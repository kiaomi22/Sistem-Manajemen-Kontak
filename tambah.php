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

<div class="max-w-xl mx-auto bg-white shadow-xl p-8 rounded-2xl">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tambah Kontak Baru</h2>

    <form method="POST" class="space-y-5">

        <div>
            <label class="font-semibold">Nama</label>
            <input name="nama" value="<?= $nama ?>"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
            <?php if (isset($errors['nama'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['nama'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label class="font-semibold">Email</label>
            <input name="email" value="<?= $email ?>"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
            <?php if (isset($errors['email'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['email'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label class="font-semibold">Telepon</label>
            <input name="telepon" value="<?= $telepon ?>"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
            <?php if (isset($errors['telepon'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['telepon'] ?></p>
            <?php endif; ?>
        </div>

        <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
            Simpan
        </button>
    </form>

</div>

</body>
</html>

