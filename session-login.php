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
<body class="bg-gray-100 h-screen flex justify-center items-center">

<div class="bg-white p-8 rounded shadow w-96">
    <h2 class="text-2xl font-bold mb-4">Login</h2>

    <?php if ($error): ?>
        <p class="text-red-500 mb-3"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <input name="username" class="w-full p-2 border rounded mb-3" placeholder="Username">
        <input name="password" type="password" class="w-full p-2 border rounded mb-3" placeholder="Password">

        <button class="bg-blue-600 text-white w-full p-2 rounded">Login</button>
    </form>
</div>

</body>
</html>
