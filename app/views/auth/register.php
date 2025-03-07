<?php
$title = 'Registro';
ob_start();
?>
<h1>Registro</h1>

<!-- Mostrar mensajes de error o éxito -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<!-- Formulario de registro -->
<form action="index.php?action=register" method="post">
    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Registrarse</button>
    </div>
</form>

<p>¿Ya tienes una cuenta? <a href="index.php?action=login">Inicia sesión aquí</a>.</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>