<?php
// Página inicial, apresentada antes do usuário logar
session_start();
require "INC/funcoes.inc";

function validar($login, $senha){
    $arquivo = fopen("users.json", 'r');
    $txt = "";
    while(!feof($arquivo)) $txt .= fgets($arquivo);
    $json = json_decode($txt);
    fclose($arquivo);
    foreach ($json as $pessoa) {
        if ($pessoa->login == $login && $pessoa->senha == $senha) return true;
    }
    return false;
}

        // Verifica se login e a senha vem da sessao ou do post
		if(!$_SESSION["login"]) {
			$login = $_POST["login"];
			$senha = $_POST["senha"];
		}
        else {
			$login = $_SESSION["login"];
			$senha = $_SESSION["senha"];
		}
		if(!$login) { //Procedimento se não estiver logado
			header("Location: login.php");
		}
        else if(validar($login, $senha)) {//Senha correta
            echo "<h2>Login bem sucedido</h2>";
			$_SESSION["login"] = $login;
			$_SESSION["senha"] = $senha;
            ?>
            <!Doctype>
            <html>
                <head>
                    <title>Bem vindo</title>
                </head>
                <body>
                    <h1>BEM VINDO AO SHOW DO BILHÃO</h1>
                    <p>As regras são claras! Responda às perguntas SEM ERRAR e ganhe UM BILHÃO</p>
                    <form method="get" action="perguntas.php">
                        <input type="hidden" name="num" value="0">
                        <button type="submit">Começar</button>
                    </form>
            <?php
        }
        else { //Senha incorreta
			?>
            <h2>Falha no login</h2>
			<a href='/login.php'>Tentar Novamente</a>
            <?php
		}
        include "rodape.inc"; ?>
    </body>
</html>
<html>
    <head>
        <title>GameMaster</title>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset=utf-8>
    </head>
    <body>
        <a href="home.php">Go Home!</a> <br>
        <a href="">Novo usuário</a> <br>
        <a href="">Logar</a>
    </body>
</html>