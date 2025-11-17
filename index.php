<?php require "data.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-8">

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Manajemen Kontak</h1>

        <a href="logout.php" 
           class="text-red-600 font-semibold hover:underline">
            Logout
        </a>
    </div>

    <a href="tambah.php"
       class="inline-block bg-blue-600 text-white px-5 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition">
        + Tambah Kontak
    </a>

    <div class="mt-6 overflow-hidden bg-white shadow-lg rounded-xl">
        <table class="w-full text-left">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Telepon</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($_SESSION["kontak"] as $id => $k): ?>
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4"><?= htmlspecialchars($k['nama']) ?></td>
                    <td class="p-4"><?= htmlspecialchars($k['email']) ?></td>
                    <td class="p-4"><?= htmlspecialchars($k['telepon']) ?></td>
                    <td class="p-4">
                        <a href="edit.php?id=<?= $id ?>" 
                           class="text-blue-600 hover:underline font-semibold mr-3">Edit</a>
                        <a href="hapus.php?id=<?= $id ?>"
                           class="text-red-600 hover:underline font-semibold"
                           onclick="return confirm('Hapus kontak?')">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>

</body>
</html>

