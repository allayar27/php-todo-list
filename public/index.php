<?php

require_once('../vendor/autoload.php');

use Core\Router;
use Controllers\TaskController;
 
// Настройка маршрутов
Router::get('/', [TaskController::class, 'index']);
Router::get('/tasks/create', [TaskController::class, 'create']);
Router::post('/tasks/store', [TaskController::class, 'store']);
Router::get('/tasks/edit', [TaskController::class, 'edit']);
Router::post('/tasks/update', [TaskController::class, 'update']);
Router::post('/tasks/delete', [TaskController::class, 'delete']);
Router::post('/tasks/complete', [TaskController::class, 'complete']);

Router::run();