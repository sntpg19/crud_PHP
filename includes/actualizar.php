<?php
require_once "conexion.php";

$id = $_POST["id"];
$nombre = trim($_POST["nombre"]);
$edad = trim($_POST["edad"]);
$ciudad = trim($_POST["ciudad"]);

// VALIDACIÓN BÁSICA (refuerzo)
if (
    empty($nombre) ||
    empty($edad) ||
    empty($ciudad)
) {
    header("Location: ../editar.php?id=$id");
    exit;
}

$sql = "UPDATE usuarios
        SET nombre = :nombre,
            edad = :edad,
            ciudad = :ciudad
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":nombre", $nombre);
$stmt->bindParam(":edad", $edad);
$stmt->bindParam(":ciudad", $ciudad);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

header("Location: ../index.php");
exit;
