<?php
session_start();

if (empty($_SESSION)) {
    header("Location: tela_de_login.php?msgErro = Por favor efetue o login!");
}
else{
    session_destroy();
    header("Location: tela_de_login.php?msgSucesso = Logout efetuado com sucesso");
}
die();
?>