<?php

class Database {
    public $connection;

    function __construct() {
        $this->open_db_connection();
    }

    public function open_db_connection() {
        $this->connection = new mysqli(
            'localhost', //host
            'root', //user
            '', //pass
            'tasks_db' //db name   
        );

        if ($this->connection->errno) {
            die('Error connecting database');
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);

        if (!$result)
            die('Query failed');

        return $result;
    }

    public function escape_string($string) {
        return $this->connection->real_escape_string($string);
    }
}

$database = new Database;

?>