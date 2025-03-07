<?php
// require_once '../models/TaskModel.php';
require_once __DIR__ . '/../models/TaskModel.php';
class TaskController {
    private $model;

    public function __construct($conn) {
        $this->model = new TaskModel($conn);
    }

    public function index() {
        $tasks = $this->model->getAllTasks();
        require_once  __DIR__ . '/../views/tasks/index.php';
    }

    public function show($id) {
        $task = $this->model->getTaskById($id);
        require_once  __DIR__ . '/../views/tasks/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description']
            ];
            $this->model->createTask($data);
            header('Location: index.php');
        } else {
            require_once  __DIR__ . '/../views/tasks/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description']
            ];
            $this->model->updateTask($id, $data);
            header('Location: index.php');
        } else {
            $task = $this->model->getTaskById($id);
            require_once '../views/tasks/edit.php';
        }
    }

    public function delete($id) {
        $this->model->deleteTask($id);
        header('Location: index.php');
    }
}
?>