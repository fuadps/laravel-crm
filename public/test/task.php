<?php

require_once('database.php');

class Task {

    public $id;
    public $title;
    public $description;
    public $due_date;

    public static function all(){
        global $database;
        $sql = "SELECT * FROM tasks";

        $result = $database->query($sql);

        
        while($row = $result->fetch_array()) {
            $task = new Task;

            $task->id = $row['id'];
            $task->title = $row['title'];
            $task->description = $row['description'];
            $task->due_date = $row['due_date'];

            $rows[] = $task;
        }

        return $rows;

    }

    public static function find($id) {
        global $database;
        $sql = $sql = "SELECT * FROM tasks WHERE id = $id LIMIT 1";

        $result = $database->query($sql);

        while($row = $result->fetch_array()) {
            $task = new Task;

            $task->id = $row['id'];
            $task->title = $row['title'];
            $task->description = $row['description'];
            $task->due_date = $row['due_date'];

            $rows[] = $task;
        }

        return !empty($rows) ? array_shift($rows) : false;

    }

    public function create() {
        global $database;

        $sql = "INSERT INTO tasks (title,description,due_date) VALUES ('{$this->title}','{$this->description}','{$this->due_date}')";

        return $database->query($sql) ? true : false ;
    }

    public function update() {
        global $database;
        
    }

    public function delete() {
        global $database;

        $sql = "DELETE FROM tasks WHERE id = $this->id";

        return $database->query($sql) ? true : false;

    }

}

?>