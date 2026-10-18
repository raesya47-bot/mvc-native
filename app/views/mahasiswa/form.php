
<?php
$e = static fn($value) =>
    htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');

$title = $isEdit ? 'Edit Mahasiswa' : 'Tambah Mahasiswa';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button, a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 14px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #174a7e;
            color: white;
        }

        a {
            background: #6c757d;
            color: white;
        }

        .error {
            background: #f8d7da;
            padding: 10px;
            color: #842029;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1><?= $title ?></h1>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= $e($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST"
          action="index.php?action=<?= $isEdit ? 'edit&id=' . (int) ($_GET['id'] ?? 0) : 'create' ?>">

        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim"
               value="<?= $e($data['nim'] ?? '') ?>" required>

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama"
               value="<?= $e($data['nama'] ?? '') ?>" required>

        <label for="prodi">Program Studi</label>
        <input type="text" id="prodi" name="prodi"
               value="<?= $e($data['prodi'] ?? '') ?>" required>

        <button type="submit">Simpan Data</button>
        <a href="index.php?action=index">Kembali</a>
    </form>
</div>
</body>
</html>
