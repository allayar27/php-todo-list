<?php

namespace Controllers;

use Core\Database;
use Models\Task;

use Services\TaskService;

class TaskController
{
    private TaskService $taskService;

    public function __construct()
    {
        $dbConnection = Database::getConnection();
        $taskModel = new Task($dbConnection);
        $this->taskService = new TaskService($taskModel);
    }

    public function index()
    {
        $tasks = $this->taskService->showAll();
        require '../src/Views/tasks/index.php';
    }

    public function create()
    {
        require '../src/Views/tasks/create.php';
    }

    public function store()
    {
        $this->taskService->insertTask($_POST);
        header('Location: /');
    }

    public function edit()
    {
        if (!isset($_GET['id'])) {
            die('Error: ID parameter is missing.');
        }
        $id = (int)$_GET['id'];

        try {
            $task = $this->taskService->getTaskById($id);
        } catch (\RuntimeException $e) {
            die($e->getMessage());
        }
        require '../src/Views/tasks/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id'];
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'status' => $_POST['status']
            ];

            try {
                $this->taskService->updateTask($id, $data);
                header('Location: /');
            }
            catch (\Exception $e) {
                die($e->getMessage());
            }
        }
    }
 
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) $_POST['id'];

            try {
                $this->taskService->deleteTask($id);
                header('Location: /');
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }
    }

    public function complete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) $_POST['id'];

            try {
                $this->taskService->completeTask($id);
                header('Location: /');
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }
    }
}
