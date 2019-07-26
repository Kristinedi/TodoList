<?php

namespace App\Models;

class Database {
    protected $connection;

    // Creates a database connection
    public function __construct(
        $servername = "localhost",
        $username = "todo_list_user",
        $password = "LoguDAFo5OqaMekewe165ANiv8POge",
        $database = "todo_list"
    ) {
        try {
            $this->connection = new \PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // Set the PDO error mode to exception
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch (\PDOException $e)
        {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Executes a MySQL query and returns results
    public function query($query, $params = array()) {
        $statement = $this->connection->prepare($query);
 
        if (count($params) > 0) {
            $statement->execute($params);
        } else {
            $statement->execute();
        }

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
