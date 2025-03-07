<?php
$title = 'Lista de Tareas';
ob_start();
?>
<h1>Lista de Tareas</h1>
<a href="index.php?action=create">Crear Nueva Tarea</a>
<ul>
    <?php foreach ($tasks as $task): ?>
    <li>
        <a href="index.php?action=show&id=<?php echo $task['id']; ?>">
            <?php echo $task['title']; ?>
        </a>
        <a href="index.php?action=edit&id=<?php echo $task['id']; ?>">Editar</a>
        <a href="index.php?action=delete&id=<?php echo $task['id']; ?>">Eliminar</a>
    </li>
    <?php endforeach; ?>
</ul>
<?php
$content = ob_get_clean();
include  __DIR__.'/../layout.php';
?>