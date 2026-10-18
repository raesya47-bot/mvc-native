
<?php

require_once __DIR__ . '/../app/controllers/MahasiswaController.php';

$controller = new MahasiswaController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    default:
        http_response_code(404);
        echo 'Halaman tidak ditemukan.';
        break;
}
