<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);

    if ($user === "" || $pass === "") {
        $error = "Semua field harus diisi.";
    } elseif ($user == "admin" && $pass == "123456") {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $user;
        header("Location: index.php");
        exit;
    } else {
        $error = "Login gagal!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-blue-200 h-screen flex justify-center items-center font-sans">

<div class="bg-white/90 backdrop-blur p-8 rounded-2xl shadow-xl w-[380px] border border-white/50">
    
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">
        Login Sistem Kontak
    </h2>

    <?php if ($error): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <label class="font-semibold">Username</label>
            <input name="username"
                   class="w-full mt-1 p-3 rounded-lg border focus:ring-2 focus:ring-blue-400 outline-none" 
                   placeholder="Masukkan Username">
        </div>

        <div>
            <label class="font-semibold">Password</label>
            <input name="password" type="password"
                   class="w-full mt-1 p-3 rounded-lg border focus:ring-2 focus:ring-blue-400 outline-none" 
                   placeholder="Masukkan Password">
        </div>

        <button class="w-full bg-blue-600 text-white py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
            Login
        </button>
    </form>
</div>

</body>
</html>

