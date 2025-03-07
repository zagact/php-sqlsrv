<?php
require_once __DIR__ . '/../models/UserModel.php';

class AuthController {
    private $model;

    public function __construct($conn) {
        $this->model = new UserModel($conn);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
            } else {
                $_SESSION['error'] = 'Correo electrónico o contraseña incorrectos.';
                header('Location: index.php?action=login');
            }
        } else {
            require_once __DIR__ . '/../views/auth/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            // $password = $_POST['password'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // return print_r($password);
            $res = $this->model->createUser($name, $email, $password);
            if ($res) {
                $_SESSION['success'] = 'Registro exitoso. Inicia sesión.';
                header('Location: index.php?action=login');
            } else {
                $_SESSION['error'] = 'Error al registrar el usuario.';
                // print_r($res);
                header('Location: index.php?action=register');
            }
        } else {
            require_once __DIR__ . '/../views/auth/register.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }
}
?>