<?php
$title = 'Iniciar Sesión';
ob_start();
?>
<h1>Iniciar Sesión</h1>

<!-- Mostrar mensajes de error o éxito -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<!-- Formulario de login -->
<form action="index.php?action=login" method="post">
    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Iniciar Sesión</button>
    </div>
</form>

<p>¿No tienes una cuenta? <a href="index.php?action=register">Regístrate aquí</a>.</p>

<!-- <?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?> -->