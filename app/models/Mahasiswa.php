
<?php

require_once __DIR__ . '/../../config/database.php';

class Mahasiswa
{
    private PDO $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll(): array
    {
        $sql = "SELECT id, nim, nama, prodi, created_at
                FROM mahasiswa
                ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getById(int $id): ?array
    {
        $sql = "SELECT id, nim, nama, prodi, created_at
                FROM mahasiswa
                WHERE id = :id
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        $data = $stmt->fetch();

        return $data ?: null;
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO mahasiswa (nim, nama, prodi)
                VALUES (:nim, :nama, :prodi)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'prodi' => $data['prodi']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE mahasiswa
                SET nim = :nim,
                    nama = :nama,
                    prodi = :prodi
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'prodi' => $data['prodi']
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM mahasiswa
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            'id' => $id
        ]);
    }
}
