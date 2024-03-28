<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once 'partials/head.php';
include_once 'partials/navbar.php';
$config = require_once 'db/config.php';
require_once 'db/db_conn.php';
require_once 'db/UsersDTO.php';

use db\DB_PDO;
use UsersDTO\UsersDTO;

// Creo una nuova instanza di connessione PDO

$PDOConnInstance = DB_PDO::getInstance($config);

// Recupero la connessione

$conn = $PDOConnInstance->getConnection();

// Leggo gli utenti dal database con UserDTO passando la connessione appena recuperata e li salvo in una variabile $users

$usersDTO = new UsersDTO($conn);

$users = $usersDTO->getAllUsers()


?>

<body>
<?php

if (empty($users)) { ?>
    <h2 class="text-center text-danger fs-5 mt-5">Nessun utente presente!</h2>
<?php } else { ?>

    <div class="my-3">
        <a href="actions/add_user.php" class="btn btn-primary">Aggiungi nuovo utente</a>
        <table class="table table-dark table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) { ?>
                <tr>
                    <td><?=$user['id']?></td>
                    <td><?=$user['nome']?></td>
                    <td><?=$user['cognome']?></td>
                    <td><?=$user['email']?></td>
                    <td>
                        <a href="controller.php?action=update_book&id=<?=$user['id']?>" class="btn btn-primary">Modifica</a>
                        <a href="controller.php?action=delete_book&id=<?=$user['id']?>" class="btn btn-danger">Cancella</a>
                    </td>
                </tr> <?php } ?>
            </tbody>
        </table>
    </div>
<?php }
include_once 'partials/footer.php';
?>
</body>
