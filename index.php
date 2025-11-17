<?php require "data.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen p-10">

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Manajemen Kontak</h1>

        <a href="logout.php" 
           class="text-red-600 font-semibold hover:text-red-700 hover:underline text-lg transition">
            Logout
        </a>
    </div>

    <a href="tambah.php"
       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold
              shadow-md hover:bg-blue-700 hover:shadow-lg transition mb-5">
        + Tambah Kontak
    </a>

    <div class="overflow-hidden bg-white shadow-xl rounded-2xl border border-gray-200">

        <table class="w-full">
            <thead class="bg-blue-600 text-white">
                <tr class="text-left">
                    <th class="p-4 text-sm font-semibold">Nama</th>
                    <th class="p-4 text-sm font-semibold">Email</th>
                    <th class="p-4 text-sm font-semibold">Telepon</th>
                    <th class="p-4 text-sm font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">
                <?php foreach ($_SESSION["kontak"] as $id => $k): ?>
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4"><?= htmlspecialchars($k['nama']) ?></td>
                    <td class="p-4"><?= htmlspecialchars($k['email']) ?></td>
                    <td class="p-4"><?= htmlspecialchars($k['telepon']) ?></td>
                    <td class="p-4 flex gap-4">
                        <a href="edit.php?id=<?= $id ?>" 
                           class="text-blue-600 hover:underline font-semibold">Edit</a>

                        <a href="hapus.php?id=<?= $id ?>"
                           class="text-red-600 hover:underline font-semibold">
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
