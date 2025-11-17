<?php
require "data.php";

$id = $_GET["id"];
$kontak = $_SESSION["kontak"][$id];

$nama = $kontak["nama"];
$email = $kontak["email"];
$telepon = $kontak["telepon"];

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nama"])) $errors["nama"] = "Nama wajib diisi.";
    else $nama = trim($_POST["nama"]);

    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        $errors["email"] = "Email tidak valid.";
    else $email = trim($_POST["email"]);

    if (empty($_POST["telepon"]) || !is_numeric($_POST["telepon"]))
        $errors["telepon"] = "Telepon harus angka.";
    else $telepon = trim($_POST["telepon"]);

    if (!$errors) {
        $_SESSION["kontak"][$id] = [
            "nama" => $nama,
            "email" => $email,
            "telepon" => $telepon
        ];
        header("Location: index.php");
        exit;
    }
}
?>
