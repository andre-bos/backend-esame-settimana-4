<?php

namespace FormValidationClasses {
use UsersManager\User;
    class userValidation {
        public function validateUser(User $user) {
            $errors = [];
    
            // Controllo per il nome
            $nome = trim(htmlspecialchars($user->nome));
            if(strlen($nome) < 2 || strlen($nome) === 0) {
                $errors['nome'] = 'Il campo nome è vuoto o ha una lunghezza inferiore a due caratteri';
            }
    
            // Controllo per il cognome
            $cognome = trim(htmlspecialchars($user->cognome));
            if(strlen($cognome) < 2 || strlen($cognome) === 0) {
                $errors['cognome'] = 'Il campo cognome è vuoto o ha una lunghezza inferiore a due caratteri';
            }
    
            // Controllo per l'email
            $email = trim(htmlspecialchars($user->email));
            if (empty($email)) {
                $errors['email'] = 'L\'email è obbligatoria.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'L\'email non è valida.';
            }
    
            // Controllo per la password
            $password = trim(htmlspecialchars($user->password));
            if (empty($password)) {
                $errors['password'] = 'La password è obbligatoria.';
            } else {
                $pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
                if (!preg_match($pattern, $password)) {
                    $errors['password'] = 'La password deve contenere almeno un carattere alfabetico, un numero, un carattere speciale e deve essere lunga almeno 8 caratteri.';
                }
            }
    
            // Aggiungi qui altre validazioni se necessario
    
            return $errors;
        }
        }
    }