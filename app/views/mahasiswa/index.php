
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f6f9;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #174a7e;
            color: white;
        }

        a, button {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .tambah {
            background: #198754;
            color: white;
        }

        .edit {
            background: #ffc107;
            color: black;
        }

        .hapus {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Data Mahasiswa</h1>
    <p>Aplikasi CRUD Mahasiswa dengan PHP Native dan MVC.</p>

    <a class="tambah" href="index.php?action=create">
        Tambah Mahasiswa
    </a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($mahasiswa)): ?>
            <tr>
                <td colspan="5">Belum ada data mahasiswa.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($mahasiswa as $i => $item): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($item['nim'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($item['nama'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($item['prodi'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <a class="edit"
                           href="index.php?action=edit&id=<?= (int) $item['id'] ?>">
                            Edit
                        </a>

                        <form action="index.php?action=delete"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <input type="hidden" name="id"
                                   value="<?= (int) $item['id'] ?>">
                            <button class="hapus" type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
