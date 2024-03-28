<?php

namespace UsersManager {
    class User {
        public function __construct(
            private string $nome,
            private string $cognome,
            private string $email,
            private string $password,
            private ?int $id = null // Imposto l'id facoltativo perché se creo uno User a partire dai dati di un form non avrò un id da passare, ma se lo creo leggendo i dati dal database, allora l'id dovrà essere passato
        ) {
            // Faccio il trim dei dati iniettati nel costruttore per rimuovere gli spazi bianchi
            $this->nome = trim($nome);
            $this->cognome = trim($cognome);
            $this->email = trim($email);
            $this->password = trim($password);
        }

        // Utilizzo il metodo magico __get() per leggere le proprietà private
        public function __get($property) {
            if(property_exists($this, $property)) {
                return $this->$property;
            }
        }
    }
}