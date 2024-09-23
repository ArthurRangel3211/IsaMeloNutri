<?php
require_once 'config.php';

if (!empty($_POST)) {
    session_start();
    try {
        $sql = "SELECT nome, email, telefone, genero, data_nascimento FROM cadastropacientes WHERE email = :email AND senha = :senha";
        
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':email'=>$_POST['email'],
            ':senha'=>md5($_POST['senha'])
        );

        $stmt->execute($dados);

        $result = $stmt->fetchAll();
        /*
        echo'<pre>';
        print_r($result);
        echo'</pre>';
        die();
        */
        if($stmt->rowCount()==1){
           
            $result = $result[0];

            $_SESSION['nome'] = $result['nome'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['data_nascimento'] = $result['data_nascimento'];
            $_SESSION['telefone'] = $result['telefone'];

            header("Location: Home_logado.php");
        }
        else{
                session_destroy();
                header("Location: tela_de_login.php?msgErro = email ou senha inválidos");
            }
        }

    catch (PDOException $e) {
        die($e->getMessage());
    }
}
else{
    header("Location: tela_de_login.php?msgErro = Por favor efetue o login!");
}
die();
?>
