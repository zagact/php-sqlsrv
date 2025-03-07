<?php
class TaskModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllTasks() {
        $sql = "SELECT * FROM tasks";
        $stmt = sqlsrv_query($this->conn, $sql);
        $tasks = [];

        // if (count($tasks) == 0) {
        //     # code...
        //     return $tasks;
        // }
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function getTaskById($id) {
        $sql = "SELECT * FROM tasks WHERE id = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }

    public function createTask($data) {
        $sql = "INSERT INTO tasks (title, description, finish) VALUES (?, ?, ?)";
        $params = array($data['title'], $data['description'], false);
        return sqlsrv_query($this->conn, $sql, $params);
    }

    public function updateTask($id, $data) {
        $sql = "UPDATE tasks SET title = ?, description = ? WHERE id = ?";
        $params = array($data['title'], $data['description'], $id);
        return sqlsrv_query($this->conn, $sql, $params);
    }

    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id = ?";
        $params = array($id);
        return sqlsrv_query($this->conn, $sql, $params);
    }
}
?>