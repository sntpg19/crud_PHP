<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $edad = trim($_POST["edad"] ?? "");
    $ciudad = trim($_POST["ciudad"] ?? "");

    // NOMBRE
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        $errores[] = "El nombre solo puede contener letras.";
    }

    // EDAD
    if (empty($edad)) {
        $errores[] = "La edad es obligatoria.";
    } elseif (!filter_var($edad, FILTER_VALIDATE_INT)) {
        $errores[] = "La edad debe ser un número entero.";
    } elseif ($edad < 1 || $edad > 120) {
        $errores[] = "La edad debe estar entre 1 y 120.";
    }

    // CIUDAD
    if (empty($ciudad)) {
        $errores[] = "La ciudad es obligatoria.";
    } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $ciudad)) {
        $errores[] = "La ciudad solo puede contener letras.";
    }
}
