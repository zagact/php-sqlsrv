<?php
session_start(); // Inicia la sesión

require_once __DIR__ . '/config/database.php'; // Conexión a la base de datos
require_once __DIR__ . '/app/controllers/AuthController.php'; // Controlador de autenticación
require_once __DIR__ . '/app/controllers/TaskController.php'; // Controlador de tareas

$action = isset($_GET['action']) ? $_GET['action'] : 'index'; // Acción por defecto: 'index'
$id = isset($_GET['id']) ? $_GET['id'] : null; // ID de la tarea (si existe)

// Instancias de los controladores
$authController = new AuthController($conn);
$taskController = new TaskController($conn);

// Rutas públicas (no requieren autenticación)
$publicRoutes = ['login', 'register'];

if (in_array($action, $publicRoutes)) {
    // Si la acción es pública, manejar con AuthController
    $authController->$action();
} else {
    // Verificar si el usuario está logueado
    if (isset($_SESSION['user'])) {
        // Rutas protegidas (requieren autenticación)
        switch ($action) {
            case 'index':
                $taskController->index();
                break;
            case 'show':
                $taskController->show($id);
                break;
            case 'create':
                $taskController->create();
                break;
            case 'edit':
                $taskController->edit($id);
                break;
            case 'delete':
                $taskController->delete($id);
                break;
            case 'logout':
                $authController->logout();
                break;
            default:
                // Si la acción no existe, redirigir al inicio
                header('Location: index.php');
                break;
        }
    } else {
        // Si el usuario no está logueado, redirigir al login
        header('Location: index.php?action=login');
        exit(); // Detener la ejecución del script
    }
}
?>