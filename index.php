<?php
require_once "./config/database.php";
require_once "./models/Denuncia.php";

$denuncia = new Denuncia($conn);

// Parámetros comunes para todas las vistas
$search = $_GET['search'] ?? "";
$limit  = 5;
$page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page   = max($page, 1);
$start  = ($page - 1) * $limit;

$data  = $denuncia->getAll($search, $start, $limit);
$total = $denuncia->count($search);
$pages = ($total > 0) ? ceil($total / $limit) : 1;

// Enrutamiento
$view = $_GET['view'] ?? "denuncias";
$viewFile = "./views/{$view}.php";

if (file_exists($viewFile)) {
    include $viewFile;
} else {
    include "./views/notfound.php"; // Vista 404
}
