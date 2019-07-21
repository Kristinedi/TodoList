<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use App\Controllers\TodoController;

$action = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
} else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
}

$controller = new TodoController();

// Router. Calls controller method based on action
switch ($action) {
    case "":
        return $controller->index();
    case "create":
        return $controller->create();
    case "store":
        return $controller->store($_POST);
    case "edit":
        return $controller->edit($_GET['id']);
    case "update":
        return $controller->update($_POST['id'], $_POST);
    case "delete":
        return $controller->delete($_POST['id']);
    case "check":
        return $controller->check($_POST['id']);
    default:
        require '../views/errors/404.html';
}