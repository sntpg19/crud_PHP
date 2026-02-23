<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errores)) {

    require_once "conexion.php";

    $sql = "INSERT INTO usuarios (nombre, edad, ciudad)
            VALUES (:nombre, :edad, :ciudad)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":edad", $edad);
    $stmt->bindParam(":ciudad", $ciudad);

    $stmt->execute();
}
