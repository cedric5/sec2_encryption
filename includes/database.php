<?php
class DataBase {
    public function db_connect() {
        $connection = new mysqli('localhost', 'root', '', 'sec2');
        if ($connection->connect_errno > 0) {
            die('Unable to connect to database [' . $db->connect_error . ']');
        } else {
            return $connection;
        }
    }
    function selectColumn($query) {
        $conn = $this->db_connect();
        $row = $conn->query($query)->fetch_array();
        $result = $row[0];
        return $result;
    }
    function query($query) {
        $conn = $this->db_connect();
        $result = $conn->query($query);
        if (!$result) {
            die("An error has occurred:" . mysqli_error($conn));
        } else {
            return $result;
        }
    }
}
