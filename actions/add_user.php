<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once '../partials/head.php';
    include_once '../partials/navbar.php';

    session_start();

    print_r($_SESSION['errori']);
    print_r($_SESSION['success']);
?>

<body>
<div class="container">
    <div class="row">
        <h2 class="text-center mt-5">Aggiungi un Utente</h2>
        <form class="mt-5" action="/backend-esame-settimana-4/controller.php?action=add_user" method="post">
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="titolo" class="col-form-label">Nome</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="nome" name="nome" class="form-control" aria-description="Nome" value="">
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
                        <label for="titolo" class="col-form-label">Cognome</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="cognome" name="cognome" class="form-control" aria-description="Cognome" value="">
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
                        <label for="anno" class="col-form-label">E-mail</label>
                    </div>
                    <div class="col-auto">
                        <input type="email" id="email" name="email" class="form-control" aria-description="E-mail"
                               value="<?php
                        if (isset($_SESSION['datiInseriti']['anno'])) {
                            echo $_SESSION['datiInseriti']['anno'];
                        }
                        ?>">
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
                        <label for="genere" class="col-form-label">Password</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" id="password" name="password" class="form-control" aria-description="Password"
                               value="<?php
                        if (isset($_SESSION['datiInseriti']['genere'])) {
                            echo $_SESSION['datiInseriti']['genere'];
                        }
                        ?>">
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
            <button type="submit" class="btn btn-primary">Aggiungi utente</button>
        </form>

        <?php
        if (isset($_SESSION['success'])) { ?>
            <p class="text-success"><?=$_SESSION['success'] ?></p>
        <?php }
        ?>

        <?php
        session_destroy();
        ?>

    </div>
</div>
<?php
include_once '../partials/footer.php';
?>
</body>