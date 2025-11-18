<?php
require_once "../config/database.php";
require_once "../models/Denuncia.php";

$denuncia = new Denuncia($conn);
$action = $_GET['action'] ?? '';

switch ($action) {

    case 'create':
        if (!empty($_POST)) {
            $fecha = !empty($_POST['fecha_registro'])
                ? $_POST['fecha_registro'] . ' 00:00:00'
                : date('Y-m-d H:i:s');

            $data = [
                ":titulo" => $_POST['titulo'],
                ":descripcion" => $_POST['descripcion'],
                ":ubicacion" => $_POST['ubicacion'],
                ":estado" => $_POST['estado'],
                ":ciudadano" => $_POST['ciudadano'],
                ":telefono_ciudadano" => $_POST['telefono_ciudadano'],
                ":fecha_registro" => $fecha
            ];
            $denuncia->create($data);
        }
        header("Location: ../index.php?msg=created");
        break;

    case 'update':
        if (!empty($_POST)) {
            $fecha = !empty($_POST['fecha_registro'])
                ? $_POST['fecha_registro'] . ' 00:00:00'
                : date('Y-m-d H:i:s');

            $data = [
                ":titulo" => $_POST['titulo'],
                ":descripcion" => $_POST['descripcion'],
                ":ubicacion" => $_POST['ubicacion'],
                ":estado" => $_POST['estado'],
                ":ciudadano" => $_POST['ciudadano'],
                ":telefono_ciudadano" => $_POST['telefono_ciudadano'],
                ":fecha_registro" => $fecha,
                ":id" => $_POST['id']
            ];
            $denuncia->update($data);
        }
        header("Location: ../index.php?msg=updated");
        break;

    case 'delete':
        if (!empty($_POST['id_delete'])) {
            $denuncia->delete($_POST['id_delete']);
        }
        header("Location: ../index.php?msg=deleted");
        break;

    default:
        header("Location: ../index.php");
        break;
}
