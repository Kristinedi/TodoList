<?php

namespace App\Controllers;

use App\Models\TodoItemModel;
use App\Models\Database;

class TodoController {
    private $views_folder = __DIR__ . '/../../views/';

    // Get. Displays all records in the front page (views/index.php)
    public function index() {
        $models = TodoItemModel::findAll();
        require $this->views_folder . 'index.php';
    }

    // Get. Displays a particular record in views/edit.php
    public function edit($id) {
        $model = TodoItemModel::findById($id);
        require $this->views_folder . 'edit.php';
    }

    // Post. Updates record and redirects user to the front page
    public function update($id, $data) {
        $model = TodoItemModel::findById($id);
        $model->setTitle($data["title"]);
        $model->setText($data["text"]);
        $model->save();
        return $this->redirect('/');
    }

    // Get. Displays view (views/create.php)
    public function create() {
        require $this->views_folder . 'create.php';
    }

    // Post. Stores record and redirects user to the front page
    public function store($data) {
        $model = new TodoItemModel($data["title"], $data["text"]);
        $model->save();

        return $this->redirect('/');
    }

    // Post. Deletes record and redirects user to the front page
    public function delete($id) {
        $model = TodoItemModel::findById($id);
        $model->delete();
        return $this->redirect('/');
    }

    // Post. Checks/unchecks record and redirects user to the front page
    public function check($id) {
        $model = TodoItemModel::findById($id);
        $model->setIsChecked(!$model->getIsChecked());
        $model->save();
        return $this->redirect('/');
    }

    // Redirects user to a page
    public function redirect($url) {
        ob_start();
        header('Location: '. $url);
        ob_end_flush();
        die();
    }
}