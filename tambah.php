<?php
require "data.php";

$nama = "";
$email = "";
$telepon = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $telepon = $_POST["telepon"];

    if ($nama == "") $errors["nama"] = "Nama wajib diisi";
    if ($email == "") $errors["email"] = "Email wajib diisi";
    if ($telepon == "") $errors["telepon"] = "Telepon wajib diisi";

    if (empty($errors)) {
        $_SESSION["kontak"][] = [
            "nama" => $nama,
            "email" => $email,
            "telepon" => $telepon
        ];
        header("Location: index.php");
        exit;
    }
}

require "layout.php";


ob_start();
?>

<div class="bg-white/70 backdrop-blur p-10 rounded-2xl shadow-xl border border-white/50">

    <form method="POST" class="space-y-6">

        <div>
            <label class="font-semibold">👤 Nama</label>
            <input name="nama" value="<?= $nama ?>"
                class="w-full mt-1 p-3 rounded-xl border bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
            <?= isset($errors['nama']) ? "<p class='text-red-600 text-sm mt-1'>{$errors['nama']}</p>" : "" ?>
        </div>

        <div>
            <label class="font-semibold">📧 Email</label>
            <input name="email" value="<?= $email ?>"
                class="w-full mt-1 p-3 rounded-xl border bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
            <?= isset($errors['email']) ? "<p class='text-red-600 text-sm mt-1'>{$errors['email']}</p>" : "" ?>
        </div>

        <div>
            <label class="font-semibold">📱 Telepon</label>
            <input name="telepon" value="<?= $telepon ?>"
                class="w-full mt-1 p-3 rounded-xl border bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
            <?= isset($errors['telepon']) ? "<p class='text-red-600 text-sm mt-1'>{$errors['telepon']}</p>" : "" ?>
        </div>

        <button
            class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold shadow-md hover:bg-blue-700 transition">
            💾 Simpan Kontak
        </button>
    </form>

</div>

<?php
$content = ob_get_clean();
layout("Tambah Kontak", $content);
?>
