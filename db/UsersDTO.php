<?php

namespace UsersDTO {

    use UsersManager\User;
    use PDO;
    class UsersDTO {
        private PDO $conn;
        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        public function getAllUsers() {
            $res = $this->conn->query('SELECT * FROM users', PDO::FETCH_ASSOC);
            return $res ? $res : null;

            // In alternativa all'operatore ternario di sopra c'è l'if statement

            /*if($res) {
                return $res;
            }

            return null;*/
        }
        public function getUserByID(int $id) {
            $sql = 'SELECT * FROM users WHERE id = :id';

            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $id]);
            return $stm->fetchAll();

            /*if($res) {
                return $res;
            }

            return null;*/
        }
        public function saveUser(User $user) {
            $sql = "INSERT INTO users (nome, cognome, email, password) VALUES (:nome, :cognome, :email, :password)";

            $stm = $this->conn->prepare($sql);
            $stm->execute(['nome' => $user->nome, 'cognome' => $user->cognome, 'email' => $user->email, 'password' => $user->password]);
            print_r($stm->rowCount());
        }
        public function updateUser(User $user) {
            $sql = "UPDATE users SET nome = :nome, cognome = :cognome, email = :email, password = :password WHERE id = :id";

            $stm = $this->conn->prepare($sql);
            $stm->execute(['nome' => $user->nome, 'cognome' => $user->cognome, 'email' => $user->email, 'password' => $user->password]);
            print_r($stm->rowCount());
        }
        public function deleteUser(int $id) {
            $sql = "DELETE FROM users WHERE id = :id";

            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $id]);
            print_r($stm->rowCount());
        }
    }
}