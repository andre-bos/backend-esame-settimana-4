<?php

namespace db {
    use PDO;
    class DB_PDO {
        private PDO $conn;
        private static ?DB_PDO $instance = null;
        private function __construct(array $config) {
            $this->conn = new PDO($config['driver'] . ":host=" . $config['host'] . "; dbname=" . $config['dbname'], $config['user'], $config['password']);
        }
        public static function getInstance(array $config) {
            if(!self::$instance) {
                self::$instance = new DB_PDO($config);
            }

            return self::$instance;
        }
        public function getConnection() {
            return $this->conn;
        }
    }
}