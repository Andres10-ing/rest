<?php
    class db{
        // Properties
        private $dbhost = 'remotemysql.com';
        private $dbuser = 'iwtL2R5VCJ';
        private $dbpass = 'DoEjonmThn';
        private $dbname = 'iwtL2R5VCJ';

        // Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }
