<?php
$title = 'Detalles de la Tarea'; // Título de la página
ob_start(); // Inicia el buffer de salida
?>
<h1>Detalles de la Tarea</h1>

<!-- Mostrar los detalles de la tarea -->
<div>
    <h2><?php echo htmlspecialchars($task['title']); ?></h2>
    <p><?php echo htmlspecialchars($task['description']); ?></p>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($task['id']); ?></p>
</div>

<!-- Enlace para volver a la lista de tareas -->
<a href="index.php">Volver a la lista de tareas</a>

<?php
$content = ob_get_clean(); // Obtiene el contenido del buffer y lo limpia
include __DIR__ . '/../layout.php'; // Incluye el layout
?>