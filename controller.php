<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once 'FormValidation.php';
require_once 'db/User.php';
require_once 'db/UsersDTO.php';
require_once 'db/db_conn.php';
$config = require_once 'db/config.php';

use UsersManager\User;
use FormValidationClasses\userValidation;
use UsersDTO\UsersDTO;
use db\DB_PDO;

if($_REQUEST['action'] === 'add_user') {
    // Creo un nuovo utente con i dati passati dal form
    $user = new User($_REQUEST['nome'], $_REQUEST['cognome'], $_REQUEST['email'], $_REQUEST['password'], null);
    
    // Valido l'utente appena creato con il metodo validateUser() della classe userValidation() definita precedentemente e mi salvo gli eventuali errori che ritorna
    $validation = new userValidation;
    $errors = $validation->validateUser($user);

    // Se l'array degli errori è vuolto, uso la classe UsersDTO per aggiungere l'utente al DB

    if(empty($errors)) {
        // Creo una nuova instanza di connessione PDO
        $PDOConnInstance = DB_PDO::getInstance($config);

        // Recupero la connessione
        $conn = $PDOConnInstance->getConnection();

        // Creo un oggetto UsersDTO e gli passo la connessione
        $usersDTO = new UsersDTO($conn);

        // Utilizzo il metodo saveUser() di UsersDTO per salvare l'oggetto nel database
        $usersDTO->saveUser($user);
}   else {
    echo 'Dati errati';
    print_r($errors);
}

}