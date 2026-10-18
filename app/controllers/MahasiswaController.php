
<?php

require_once __DIR__ . '/../models/Mahasiswa.php';

class MahasiswaController
{
    private Mahasiswa $model;

    public function __construct()
    {
        $this->model = new Mahasiswa();
    }

    public function index(): void
    {
        $mahasiswa = $this->model->getAll();

        require __DIR__ . '/../views/mahasiswa/index.php';
    }

    public function create(): void
    {
        $data = [
            'nim' => '',
            'nama' => '',
            'prodi' => ''
        ];

        $errors = [];
        $isEdit = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->formData();
            $errors = $this->validate($data);

            if (empty($errors)) {
                try {
                    $this->model->create($data);
                    header('Location: index.php?action=index');
                    exit;
                } catch (PDOException $e) {
                    $errors[] = 'NIM sudah terdaftar atau data gagal disimpan.';
                }
            }
        }

        require __DIR__ . '/../views/mahasiswa/form.php';
    }

    public function edit(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            http_response_code(400);
            exit('ID mahasiswa tidak valid.');
        }

        $mahasiswa = $this->model->getById($id);

        if (!$mahasiswa) {
            http_response_code(404);
            exit('Data mahasiswa tidak ditemukan.');
        }

        $data = [
            'nim' => $mahasiswa['nim'],
            'nama' => $mahasiswa['nama'],
            'prodi' => $mahasiswa['prodi']
        ];

        $errors = [];
        $isEdit = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->formData();
            $errors = $this->validate($data);

            if (empty($errors)) {
                try {
                    $this->model->update($id, $data);
                    header('Location: index.php?action=index');
                    exit;
                } catch (PDOException $e) {
                    $errors[] = 'NIM sudah digunakan atau data gagal diperbarui.';
                }
            }
        }

        require __DIR__ . '/../views/mahasiswa/form.php';
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit('Metode tidak diizinkan.');
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            http_response_code(400);
            exit('ID mahasiswa tidak valid.');
        }

        $this->model->delete($id);

        header('Location: index.php?action=index');
        exit;
    }

    private function formData(): array
    {
        return [
            'nim' => trim($_POST['nim'] ?? ''),
            'nama' => trim($_POST['nama'] ?? ''),
            'prodi' => trim($_POST['prodi'] ?? '')
        ];
    }

    private function validate(array $data): array
    {
        $errors = [];

        if ($data['nim'] === '') {
            $errors[] = 'NIM wajib diisi.';
        }

        if ($data['nama'] === '') {
            $errors[] = 'Nama wajib diisi.';
        }

        if ($data['prodi'] === '') {
            $errors[] = 'Program studi wajib diisi.';
        }

        return $errors;
    }
}
