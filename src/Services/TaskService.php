<?php 

declare(strict_types=1);

namespace Services;

use Models\Task;

class TaskService
{
    private Task $taskModel;

    public function __construct(Task $taskModel)
    {
         $this->taskModel = $taskModel;
    }

    public function showAll(): array
    {
        return $this->taskModel->all();
    }

    public function getTaskById(int $id): array
    {
        $task = $this->taskModel->find($id);
        if (!$task) {
            throw new \RuntimeException('Task not found.', 404);
        }

        return $task;
    }

    public function insertTask($data)
    {
        if (empty($data['title']) || empty($data['description'])) {
            throw new \InvalidArgumentException('Title and description are required.');
        }

        return $this->taskModel->create($data);
    }

    public function deleteTask(int $id): bool
    {
        $task = $this->getTaskById($id);

        return $this->taskModel->delete($id);
    }

    public function updateTask(int $id, array $data): bool
    {
        $task = $this->getTaskById($id);

        if (empty($data['title']) || empty($data['description'])) {
            throw new \InvalidArgumentException('Title and description are required.');
        }

        return $this->taskModel->update($id, $data);
    }

    public function completeTask(int $id): bool
    {
        $task = $this->getTaskById($id);

        return $this->taskModel->complete($id);
    }
}

