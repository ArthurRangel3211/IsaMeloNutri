<?php
require_once 'config.php';

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

if(!empty($_POST)){
    try {
        $sql = "INSERT INTO cadastropacientes
                    (nome, email, senha, telefone, genero, data_nascimento)
                VALUES
                    (:nome, :email, :senha, :telefone, :genero, :data_nascimento)";
        
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':nome'=>$_POST['nome'],
            ':email'=>$_POST['email'],
            ':senha'=>md5($_POST['senha']),
            ':telefone'=>$_POST['telefone'],
            ':genero'=>$_POST['genero'],
            ':data_nascimento'=>$_POST['data_nascimento'],
        );

        if($stmt->execute($dados)) {
            header("Location: tela_de_login.php?msgSucesso=Cadastro realizado com sucesso!");
        }
    } catch (PDOException $e) {
        //die ($e->getmessage());
        header("Location: cadastro.php?msgErro=Falha ao cadastrar...");
    }
}
else{
    header("Location: tela_de_login.php?msgErro= Erro de acesso");
}
die();
?>