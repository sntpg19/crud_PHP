<?php
require_once "includes/variables.php";
require_once "includes/validaciones.php";
require_once "includes/guardar.php";
require_once "includes/listar.php";
?>

<?php include "templates/header.php"; ?>

<div class="container">

<h1>Mi Perfil</h1>

<div class="card">
<form method="POST">

    <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
    </div>

    <div class="form-group">
        <label>Edad:</label>
        <input type="number" name="edad" value="<?= htmlspecialchars($edad) ?>">
    </div>

    <div class="form-group">
        <label>Ciudad:</label>
        <input type="text" name="ciudad" value="<?= htmlspecialchars($ciudad) ?>">
    </div>

    <button type="submit" class="btn-primary">Enviar</button>
</form>
</div>

<?php if (!empty($errores)): ?>
    <div class="error-box">
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errores)): ?>
    <div class="success-box">
        <h2>Datos Validados</h2>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
        <p><strong>Edad:</strong> <?= htmlspecialchars($edad) ?></p>
        <p><strong>Ciudad:</strong> <?= htmlspecialchars($ciudad) ?></p>
    </div>
<?php endif; ?>

<h2>Usuarios Registrados</h2>

<div class="card">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Ciudad</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario["id"] ?></td>
                <td><?= htmlspecialchars($usuario["nombre"]) ?></td>
                <td><?= $usuario["edad"] ?></td>
                <td><?= htmlspecialchars($usuario["ciudad"]) ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario["id"] ?>" class="btn-edit">Editar</a>
                    <a href="includes/eliminar.php?id=<?= $usuario["id"] ?>"
                       onclick="return confirm('¿Seguro que deseas eliminar este usuario?')"
                       class="btn-delete">
                       Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No hay usuarios registrados</td>
        </tr>
    <?php endif; ?>
    </tbody>

</table>
</div>

</div>

<?php include "templates/footer.php"; ?>