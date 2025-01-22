<?php

namespace Controllers;

use Core\Database;
use Models\Task;

class TaskController
{
    private Task $taskModel;

    public function __construct()
    {
        $dbConnection = Database::getConnection();
        $this->taskModel = new Task($dbConnection);
    }

    public function index()
    {
        $tasks = $this->taskModel->all();
        require '../src/Views/tasks/index.php';
    }

    public function create()
    {
        require '../src/Views/tasks/create.php';
    }

    public function store()
    {
        $this->taskModel->create($_POST);
        header('Location: /');
    }

    public function edit()
    {
        if (!isset($_GET['id'])) {
            die('Error: ID parameter is missing.');
        }
        $id = $_GET['id'];
        
        $task = $this->taskModel->find($id);

        if (!$task) {
            die('Error: Task not found.');
        }
        require '../src/Views/tasks/edit.php';
    }

    public function update()
    {
        $this->taskModel->update($_POST['id'], $_POST);
        header('Location: /');
    }

    public function delete()
    {
        $this->taskModel->delete($_POST['id']);
        header('Location: /');
    }

    public function complete()
    {
        $this->taskModel->complete($_POST['id']);
        // var_dump($r);
        header('Location: /');
    }
}
