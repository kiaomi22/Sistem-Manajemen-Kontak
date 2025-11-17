<?php require "data.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="flex justify-between mb-5">
    <h1 class="text-3xl font-bold">Daftar Kontak</h1>
    <a href="logout.php" class="text-red-500">Logout</a>
</div>

<a href="tambah.php" class="bg-blue-600 text-white px-4 py-2 rounded">
    + Tambah Kontak
</a>

<table class="w-full bg-white mt-5 shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 text-left">Nama</th>
            <th class="p-3 text-left">Email</th>
            <th class="p-3 text-left">Telepon</th>
            <th class="p-3 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_SESSION["kontak"] as $id => $k): ?>
        <tr class="border-b">
            <td class="p-3"><?= htmlspecialchars($k["nama"]) ?></td>
            <td class="p-3"><?= htmlspecialchars($k["email"]) ?></td>
            <td class="p-3"><?= htmlspecialchars($k["telepon"]) ?></td>
            <td class="p-3">
                <a href="edit.php?id=<?= $id ?>" class="text-blue-600 mr-3">Edit</a>
                <a href="hapus.php?id=<?= $id ?>" class="text-red-600">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
