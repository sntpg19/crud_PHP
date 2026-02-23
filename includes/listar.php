<?php
require_once "conexion.php";

$sql = "SELECT id, nombre, edad, ciudad FROM usuarios ORDER BY id DESC";
$stmt = $pdo->query($sql);

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
