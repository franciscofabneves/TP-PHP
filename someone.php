<?php session_start();
require "INC/funcoes.inc";
userRefresh();
$cara = pegaPorId(pegaJson("DB/dbUsuarios.json"), $_GET["idCara"]); ?>
<!-- Página do perfil do alguém. Mostra o nome, mesas, avaliação e tags -->
<!DOCTYPE>
<html>
    <head>
        <title>Perfil de <?=$cara->nome?></title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
        });
        </script>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container-fluid"> <?php
            require "INC/navBar.inc";
            require "INC/userSideBar.inc"; ?>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 centerbar">
                <div class=divisores>
                    <h1><?= $cara->nome ?><h1>
                    <h4><?=$cara->email?></h4>
                    <div class="divider"></div>
                    <h2>Mesas de <?= $cara->nome ?>:</h2>
                    <?php //Imprindo as mesas do usuario
                    $todasAsMesas = pegaJson("DB/dbMesas.json");
                    foreach ($cara->mesas as $codMesa){
                        $mesinha = pegaPorId($todasAsMesas, $codMesa); ?>
                        <div class="divisores">
                            <h3><?=$mesinha->nome?></h3>
                            <p><strong>Endereço: </strong><?=$mesinha->endereco?></p>
                            <p><strong>Sinopse: </strong><?=$mesinha->sinopse?></p>
                            <form method="post" action="pgMesa.php">
                                <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
                                <button type="submit" class="btn btn-default">Detalhes</button>
                            </form>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>