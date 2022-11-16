<?php

// start session
session_start();

class Db {
    // read ini file
    private $config;

    // connection
    private $conn;
    private $numrows;

    // constructor
    public function __construct(){
        $this->config = parse_ini_file('config.ini');
        $this->conn = mysqli_connect($this->config['hostname'],$this->config['username'],$this->config['password'],$this->config['database']);
    }

    // get connection
    public function getConn(){
        return $this->conn;
    }

    // close connection
    public function closeConn(){
        mysqli_close($this->conn);
    }

    // run query with return
    public function runQueryWithReturn($query){
        try{
            $result = mysqli_query($this->conn, $query);
            $this->numrows = mysqli_num_rows($result);
            return $result;
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
        return $result;
    }

    // count rows in result
    public function countRows($result){
        return mysqli_num_rows($result);
    }

    // run query
    public function runQuery($query){
        try{
            mysqli_query($this->conn, $query);
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    // get rows
    public function getRows($result){
        $rows = array();
        if ($this->numrows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    // function to make update query
    public function makeUpdateQuery($table, $data, $where){
        $query = "UPDATE $table SET ";
        foreach($data as $key => $value){
            $query .= $key . " = '" . $value . "', ";
        }
        $query = substr($query, 0, -2);
        $query .= " WHERE " . $where;
        return $query;
    }

    // function to make insert query
    public function makeInsertQuery($table, $data){
        $query = "INSERT INTO $table (";
        foreach($data as $key => $value){
            $query .= $key . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES (";
        foreach($data as $key => $value){
            $query .= "'" . $value . "', ";
        }
        $query = substr($query, 0, -2);
        $query .= ")";
        return $query;
    }

    // function to make delete query
    public function makeDeleteQuery($table, $where){
        $query = "DELETE FROM $table WHERE $where";
        return $query;
    }

    // function to make select query
    public function makeSelectQuery($table, $where){
        $query = "SELECT * FROM $table WHERE $where";
        return $query;
    }

    public function getAuthors($articleid) {

        /* query sample
        SELECT users.id as id, users.firstname as firstname, users.lastname as lastname FROM users
        JOIN authors ON authors.userid = users.id
        JOIN articles
        ON authors.articleid = articles.id
        WHERE articles.id = 1 ORDER BY authors.place ASC;
        */
        $query = "SELECT users.id as id, users.firstname as firstname, users.lastname as lastname FROM users JOIN authors ON authors.userid = users.id JOIN articles ON authors.articleid = articles.id WHERE articles.id = $articleid ORDER BY authors.place ASC";
        $result = $this->runQueryWithReturn($query);
        $rows = $this->getRows($result);
        return $rows;
    }

}