<?php
require_once "conexion.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: ../index.php");
    exit;
}

$sql = "DELETE FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();

header("Location: ../index.php");
exit;
