<?php
class TaskModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; // Recibe una instancia de PDO
    }

    /**
     * Obtiene todas las tareas de la base de datos.
     *
     * @return array Un array de tareas.
     */
    public function getAllTasks() {
        $sql = "SELECT * FROM tasks";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array asociativo
    }

    /**
     * Obtiene una tarea por su ID.
     *
     * @param int $id El ID de la tarea.
     * @return array|null Los datos de la tarea o null si no se encuentra.
     */
    public function getTaskById($id) {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo
    }

    /**
     * Crea una nueva tarea en la base de datos.
     *
     * @param array $data Un array con los datos de la tarea (title, description).
     * @return bool True si la tarea fue creada, false en caso contrario.
     */
    public function createTask($data) {
        $sql = "INSERT INTO tasks (title, description, finish) VALUES (:title, :description, :finish)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'title' => $data['title'],
            'description' => $data['description'],
            'finish' => false // Valor por defecto para 'finish'
        ]);
    }

    /**
     * Actualiza una tarea existente en la base de datos.
     *
     * @param int $id El ID de la tarea.
     * @param array $data Un array con los nuevos datos de la tarea (title, description).
     * @return bool True si la tarea fue actualizada, false en caso contrario.
     */
    public function updateTask($id, $data) {
        $sql = "UPDATE tasks SET title = :title, description = :description WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'title' => $data['title'],
            'description' => $data['description'],
            'id' => $id
        ]);
    }

    /**
     * Elimina una tarea de la base de datos.
     *
     * @param int $id El ID de la tarea.
     * @return bool True si la tarea fue eliminada, false en caso contrario.
     */
    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }
}
?>