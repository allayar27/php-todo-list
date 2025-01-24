<?php

declare(strict_types=1);

namespace Models;

use Core\Database;
use PDO;

class Task
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function all(): array 
    {
        $stmt = $this->db->query("SELECT * FROM tasks");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function create($data): bool
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)");
        return $stmt->execute([$data['title'], $data['description'], 'pending']);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function update($id, $data): bool
    {
        $stmt = $this->db->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
        return $stmt->execute([$data['title'], $data['description'], $data['status'], $id]);
    }
 
    public function delete($id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function complete($id): bool
    {
        $stmt = $this->db->prepare("UPDATE tasks SET status = 'completed' WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
