<?php
require_once "includes/conexion.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: index.php");
    exit;
}

require_once "templates/header.php";
?>

<h1>Editar Usuario</h1>

<form method="POST" action="includes/actualizar.php">

    <input type="hidden" name="id" value="<?= $usuario["id"] ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre"
        required
        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
        value="<?= htmlspecialchars($usuario["nombre"]) ?>"
    ><br><br>

    <label>Edad:</label><br>
    <input type="number" name="edad"
        required min="1" max="120"
        value="<?= $usuario["edad"] ?>"
    ><br><br>

    <label>Ciudad:</label><br>
    <input type="text" name="ciudad"
        required
        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
        value="<?= htmlspecialchars($usuario["ciudad"]) ?>"
    ><br><br>

    <button type="submit">Actualizar</button>
</form>

<?php require_once "templates/footer.php"; ?>
