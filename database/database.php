<?php

include dirname(__FILE__). './config.php';


    class Database {
        private $host  = HOST;
        private $user = USER;
        private $pass = PASS;
        private $dbname = DBNAME;

        public $conn;
        public $error;



        function __construct()
        {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

            if ($this->conn->connect_error) {
                die('Database connection failed. '.$this->conn->connect_error.__LINE__);
            }
        }

        public function getData($q)
        {
            $result = $this->conn->query($q);

            if ($result->num_rows > 0) {
                return $result;
            }

            return false;

        }

        public function store($q)
        {
            $result = $this->conn->query($q);

            if ($result) {
                return true;
            } else {
                $this->error = $this->conn->error.__LINE__;
            }

            return false;
        }


    }
