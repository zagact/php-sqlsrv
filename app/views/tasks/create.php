
<?php
$title = 'Creacion de Tareas';
ob_start();
?>
<h1>Crear de Tarea</h1>

<!-- Formulario para crear una tarea -->
<form action="index.php?action=create" method="post">
    <div>
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
    </div>
    <div>
        <button type="submit">Crear Tarea</button>
    </div>
</form>
<?php
$content = ob_get_clean();
include  __DIR__.'/../layout.php';
?>