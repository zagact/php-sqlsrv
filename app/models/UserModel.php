<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; // Recibe una instancia de PDO
    }

    /**
     * Obtiene un usuario por su correo electrónico.
     *
     * @param string $email El correo electrónico del usuario.
     * @return array|null Los datos del usuario o null si no se encuentra.
     */
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo
    }

    /**
     * Crea un nuevo usuario en la base de datos.
     *
     * @param string $name El nombre del usuario.
     * @param string $email El correo electrónico del usuario.
     * @param string $password La contraseña hasheada del usuario.
     * @return bool True si el usuario fue creado, false en caso contrario.
     */
    public function createUser($name, $email, $password) {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }
}
?>