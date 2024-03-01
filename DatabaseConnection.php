<?php

class DatabaseConnection {
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "school";
    private $link;

    public function __construct() {
        $this->link = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        if ($this->link === false) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }


    public function getConnection() {
        return $this->link;
    }

    public function closeConnection() {
        mysqli_close($this->link);
    }
}

?>