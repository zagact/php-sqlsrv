<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Mi Aplicación MVC'; ?></title>
    <!-- Enlaces a hojas de estilo CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">
    <!-- Enlaces a scripts JavaScript -->
    <script src="/public/js/scripts.js" defer></script>
</head>
<body>
<?php
    if(isset($_SESSION['user'])){
        echo '<nav>
        <ul>
            <li><a href="index.php?action=home">Inicio</a></li>
            <li><a href="index.php?action=profile">Perfil</a></li>
            <li><a href="index.php?action=logout">Cerrar Sesión</a></li>
        </ul>
    </nav>';
    
    }
?>

    <main>
        <!-- Aquí se incluirá el contenido específico de cada vista -->
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Mi Aplicación MVC. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>