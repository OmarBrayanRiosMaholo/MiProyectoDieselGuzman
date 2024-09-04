<?php
session_start();

if (!isset($_SESSION['cambiar_clave']) || !$_SESSION['cambiar_clave']) {
    header('Location: dashboard.php'); // Redirige al dashboard si no es necesario cambiar la contraseña
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña</title>
</head>
<body>
    <form action="controller.php?op=cambiar_clave" method="POST">
        <input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
        <label for="nueva_clave">Nueva Contraseña:</label>
        <input type="password" id="nueva_clave" name="nueva_clave" required>
        <label for="confirmar_clave">Confirmar Contraseña:</label>
        <input type="password" id="confirmar_clave" name="confirmar_clave" required>
        <button type="submit">Cambiar Contraseña</button>
    </form>
</body>
</html>
