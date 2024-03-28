<?php

session_start();

global $db_connect;

include_once 'partials/head.php';
include_once 'partials/navbar.php';
require_once 'config.php';

if(isset($_REQUEST['id'])) {
    $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

    $sqlinstruction = "SELECT * FROM libri WHERE id = $id";

    $result= $db_connect->query($sqlinstruction);

    if($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        echo "L'id non corrisponde a nessun libro";
    }

} else {
    echo "L'URL non contiene un id valido";
}
?>

<body>
<div class="container">
    <div class="row">
        <h2 class="text-center mt-5">Modifica libro</h2>
        <form class="mt-5" action="controller.php?action=edit_book&id=<?php echo filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT)?>" method="post">
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="titolo" class="col-form-label">Titolo</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="titolo" name="titolo" class="form-control" aria-description="Titolo del libro"
                               value="<?php echo $book['titolo'] ?>">
                    </div>
                    <?php
                    if (isset($_SESSION['errori']['titolo'])) { ?>
                        <div class="col-auto">
                            <p class="text-danger"><?=$_SESSION['errori']['titolo'] ?></p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="autore" class="col-form-label">Autore</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="autore" name="autore" class="form-control" aria-describedby="autoreHelp"
                               value="<?php echo $book['autore'] ?>">
                    </div>
                    <div class="col-auto">
                        <span id="autoreHelp" class="form-text">Inserisci nome e cognome dell'autore</span>
                    </div>
                    <?php
                    if (isset($_SESSION['errori']['autore'])) { ?>
                        <div class="col-auto">
                            <p class="text-danger"><?=$_SESSION['errori']['autore'] ?></p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="anno" class="col-form-label">Anno</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="anno" name="anno" class="form-control" aria-description="Anno di pubblicazione"
                               value="<?php echo $book['anno_pubblicazione'] ?>">
                    </div>
                    <?php
                    if (isset($_SESSION['errori']['anno'])) { ?>
                        <div class="col-auto">
                            <p class="text-danger"><?=$_SESSION['errori']['anno'] ?></p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="genere" class="col-form-label">Genere</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="genere" name="genere" class="form-control" aria-description="Genere letterario"
                               value="<?php echo $book['genere'] ?>">
                    </div>
                    <?php
                    if (isset($_SESSION['errori']['genere'])) { ?>
                        <div class="col-auto">
                            <p class="text-danger"><?=$_SESSION['errori']['genere'] ?></p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Modifica libro</button>
        </form>

        <?php
        session_destroy();
        ?>

    </div>
</div>
<?php
include_once 'partials/footer.php';
?>
</body>