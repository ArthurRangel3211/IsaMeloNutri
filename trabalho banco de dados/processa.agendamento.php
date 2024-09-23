
<?php

require_once 'config.php'; 


if (!empty($_POST)) {
    try {
        
        $timestamp = $_POST['data'] . ' ' . $_POST['horario'];

        
        $sql = "INSERT INTO agendamento (nome, telefone, data, pagamento)
                VALUES (:nome, :telefone, :data, :pagamento)";
        
        
        $stmt = $pdo->prepare($sql);

        
        $dados = array(
            ':nome'     => $_POST['nome'],
            ':telefone' => $_POST['telefone'],
            ':data'     => $timestamp, 
            ':pagamento'=> $_POST['pagamento'],
        );

        
        if ($stmt->execute($dados)) {
            header("Location: confirma_agendamento.php?msgSucesso=Agendamento realizado com sucesso!");
        }
    } catch (PDOException $e) {
        
        die($e->getMessage());
        header("Location: ficha_de_agendamento.php?msgErro=Falha ao agendar...");
    }
} else {
    
    header("Location: ficha_de_agendamento.php?msgErro=Falha ao agendar...");
}
die();
?>