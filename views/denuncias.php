<?php
// Este archivo recibe las variables desde index.php:
// $data, $search, $page, $pages, $total
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Denuncias - PNL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Estilos globales -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Forzar modo claro -->
    <style>
        :root { color-scheme: light !important; }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- Sidebar -->
    <?php include "./views/shared/sidebar.php"; ?>

    <!-- Contenido principal -->
    <main class="flex-grow-1">

        <!-- Topbar -->
        <?php include "./views/shared/topbar.php"; ?>

        <div class="container-fluid py-4">

            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Denuncias</h6>

                    <div>
                        <a href="?view=denuncias" class="btn btn-outline-secondary btn-sm me-2">
                            <i class="bi bi-arrow-clockwise"></i> Actualizar
                        </a>

                        <button class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalNueva">
                            <i class="bi bi-plus-lg"></i> Nuevo
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <!-- Alertas de éxito -->
                    <?php if(isset($_GET['msg'])): ?>
                        <div class="alert alert-success small py-2">
                            ✔ Operación realizada correctamente.
                        </div>
                    <?php endif; ?>

                    <!-- Búsqueda -->
                    <form method="GET" class="mb-2">
                        <input type="hidden" name="view" value="denuncias">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control"
                                   placeholder="Buscar..." value="<?= htmlspecialchars($search) ?>">
                            <button class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                        </div>
                    </form>

                    <!-- Tabla -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered align-middle small">
                            <thead class="table-light">
                            <tr>
                                <th style="width:110px;">Opciones</th>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Ubicación</th>
                                <th>Ciudadano</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php while($row = $data->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td>
                                        <!-- Botón Editar -->
                                        <button class="btn btn-warning btn-sm me-1 btn-edit"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEditar"
                                                data-id="<?= $row['id']; ?>"
                                                data-titulo="<?= htmlspecialchars($row['titulo']); ?>"
                                                data-descripcion="<?= htmlspecialchars($row['descripcion']); ?>"
                                                data-ubicacion="<?= htmlspecialchars($row['ubicacion']); ?>"
                                                data-estado="<?= $row['estado']; ?>"
                                                data-ciudadano="<?= htmlspecialchars($row['ciudadano']); ?>"
                                                data-telefono="<?= htmlspecialchars($row['telefono_ciudadano']); ?>"
                                                data-fecha="<?= substr($row['fecha_registro'],0,10); ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Botón Eliminar -->
                                        <button class="btn btn-danger btn-sm btn-delete"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEliminar"
                                                data-id="<?= $row['id']; ?>">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= htmlspecialchars($row['titulo']); ?></td>
                                    <td><?= htmlspecialchars($row['descripcion']); ?></td>
                                    <td><?= htmlspecialchars($row['ubicacion']); ?></td>
                                    <td><?= htmlspecialchars($row['ciudadano']); ?></td>
                                    <td><?= substr($row['fecha_registro'],0,10); ?></td>

                                    <td>
                                        <?php
                                        $est = $row['estado'];
                                        $class = match($est) {
                                            "Pendiente"  => "badge bg-warning text-dark",
                                            "En proceso" => "badge bg-info text-dark",
                                            "Resuelto"   => "badge bg-success text-light",
                                            default      => "badge bg-secondary"
                                        };
                                        ?>
                                        <span class="<?= $class ?>"><?= $est ?></span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <nav>
                        <ul class="pagination pagination-sm">
                            <li class="page-item <?= ($page<=1?'disabled':'') ?>">
                                <a class="page-link"
                                   href="?view=denuncias&page=<?= $page-1 ?>&search=<?= urlencode($search) ?>">
                                    Anterior
                                </a>
                            </li>

                            <?php for($i=1;$i<=$pages;$i++): ?>
                                <li class="page-item <?= ($i==$page?'active':'') ?>">
                                    <a class="page-link"
                                       href="?view=denuncias&page=<?= $i ?>&search=<?= urlencode($search) ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <li class="page-item <?= ($page>=$pages?'disabled':'') ?>">
                                <a class="page-link"
                                   href="?view=denuncias&page=<?= $page+1 ?>&search=<?= urlencode($search) ?>">
                                    Siguiente
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>

                <div class="card-footer text-end small text-muted">
                    © 2025 PNL Ing. Sistemas — Carrasco Millan Jose Manuel
                </div>

            </div>

        </div>
    </main>
</div>

<!-- Inclusión de modales -->
<?php include "./views/modals/modal_nuevo.php"; ?>
<?php include "./views/modals/modal_editar.php"; ?>
<?php include "./views/modals/modal_eliminar.php"; ?>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts para pasar datos a los modales -->
<script>
// Rellenar modal Editar
document.querySelectorAll(".btn-edit").forEach(btn=>{
    btn.addEventListener("click", ()=>{
        edit_id.value = btn.dataset.id;
        edit_id_show.value = btn.dataset.id;
        edit_titulo.value = btn.dataset.titulo;
        edit_descripcion.value = btn.dataset.descripcion;
        edit_ubicacion.value = btn.dataset.ubicacion;
        edit_ciudadano.value = btn.dataset.ciudadano;
        edit_telefono.value = btn.dataset.telefono;
        edit_fecha.value = btn.dataset.fecha;
        edit_estado.value = btn.dataset.estado;
    });
});

// Pasar ID al modal Eliminar
document.querySelectorAll(".btn-delete").forEach(btn=>{
    btn.addEventListener("click", ()=>{
        delete_id.value = btn.dataset.id;
    });
});
</script>

</body>
</html>
