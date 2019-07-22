<?php

namespace App\Models;

use App\Models\Database;

class TodoItemModel {
    private $id;
    private $title;
    private $text;
    private $date_created;
    private $is_checked;

    // Initializes model with fillable fields
    public function __construct($title = "", $text = "") {
        $this->title = $title;
        $this->text = $text;
    }

    // Getters and setters for properties of the records
    public function getId() {
        return $this->id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function getText() {
        return $this->text;
    }

    public function getDateCreated() {
        return $this->date_created;
    }

    public function setIsChecked($is_checked) {
        $this->is_checked = (int) $is_checked;
    }

    public function getIsChecked() {
        return (boolean) $this->is_checked;
    }

    // Finds a record in database by its ID
    public static function findById($id) {
        $database = new Database();
        $query = "SELECT * FROM todo_list_items WHERE `id` = ?";
        $params = array($id);
        $results = $database->query($query, $params);
        if (count($results) == 1) {
            $result = $results[0];

            $model = new self;
            $model->id = $result['id'];
            $model->title = $result['title'];
            $model->text = $result['text'];
            $model->date_created = $result['date_created'];
            $model->is_checked = $result['is_checked'];
            return $model;
        }
        return null;
    }

    // Updates or inserts a record to database
    public function save() {
        $database = new Database();
        if ($this->id) {
            $query = "UPDATE todo_list_items SET `title` = ?, `text` = ?, `is_checked` = ? WHERE `id` = ?";
            $params = array($this->title, $this->text, $this->is_checked, $this->id);
            $results = $database->query($query, $params);
        } else {
            $query = "INSERT INTO todo_list_items (`title`, `text`) VALUES (?, ?)";
            $params = array($this->title, $this->text);
            $results = $database->query($query, $params);
        }
        return $results;
    }

    // Deletes record from database
    public function delete() {
        $database = new Database();
        $query = "DELETE FROM todo_list_items WHERE `id` = ?";
        $params = array($this->id);
        $results = $database->query($query, $params);
    }

    // Finds all records in database
    public static function findAll() {
        $database = new Database();
        $query = "SELECT * FROM todo_list_items ORDER BY `id` DESC";
        $results = $database->query($query);
        $models = array();
        if (count($results) >= 1) {
            foreach ($results as $result) {
                $model = new self;

                $model->id = $result['id'];
                $model->title = $result['title'];
                $model->text = $result['text'];
                $model->date_created = $result['date_created'];
                $model->is_checked = $result['is_checked'];

                $models[] = $model;
            }
        }
        return $models;
    }
}