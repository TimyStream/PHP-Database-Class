<?php
    class TSDB {

        private $dbHost;
        private $dbUser;
        private $dbPassword;
        private $dbDatabase;

        // Constructor with Database Data
        function __construct($dbhost, $dbuser, $dbpassword, $dbdatabase) {
            $this->dbHost = $dbhost;
            $this->dbUser = $dbuser;
            $this->dbPassword = $dbpassword;
            $this->dbDatabase = $dbdatabase;
        }

        // Private Database Connection ( Only for use in Class )
        private function dbcon() {
            return new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbDatabase);
        }

        // Get alle the Data from a Table as "mysqli_result"
        function getAllData_mysqliResult($table) {
            $query = "SELECT * FROM $table";
            return $this->dbcon()->query($query);
        }

        // Get all the Data from a Table as "array"
        function getAllData_Array($table) {
            $query = "SELECT * FROM $table";
            $query_exec = $this->dbcon()->query($query);

            while($row = $query_exec->fetch_assoc()){
                $array[] = $row;
            }
            return $array;
        }

        // Get Specific Data from Database
        function getSpecData_mysqliResult($table, $searchspec, $spec) {
            $query = "SELECT * FROM $table WHERE $searchspec = '$spec'";
            return $this->dbcon()->query($query);
        }

        function getSpecData_Array($table, $searchspec, $spec) {
            $query = "SELECT * FROM $table WHERE $searchspec = '$spec'";
            $query_exec = $this->dbcon()->query($query);

            return $array[] = $query_exec->fetch_assoc();
        }
    }