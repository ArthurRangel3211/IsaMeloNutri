<?php
require_once 'config.php';


if (isset($_GET['data'])) {
    $dataEscolhida = $_GET['data'];

   
    $horariosDisponiveis = horariosDisponiveis($pdo, $dataEscolhida);

   
    echo json_encode($horariosDisponiveis);
} else {
   
    echo json_encode([]);
}

function horariosDisponiveis($pdo, $dataEscolhida) {
    $intervalo = 70;
    $horarioInicio = new DateTime('08:00');
    $horarioFim = new DateTime('20:00');

    
    $query = "SELECT data FROM agendamento WHERE DATE(data) = :dataEscolhida";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':dataEscolhida' => $dataEscolhida]);
    $agendamentos = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $horariosOcupados = [];
    foreach ($agendamentos as $agendamento) {
        $horaAgendada = (new DateTime($agendamento))->format('H:i');
        $horariosOcupados[] = $horaAgendada;
    }

    $horariosDisponiveis = [];
    while ($horarioInicio < $horarioFim) {
        $horarioAtual = $horarioInicio->format('H:i');
        $disponivel = true;

        
        foreach ($horariosOcupados as $horaOcupada) {
            $horaOcupadaObj = new DateTime($horaOcupada);
            $diff = abs($horarioInicio->getTimestamp() - $horaOcupadaObj->getTimestamp());

            
            if ($diff < $intervalo * 60) {
                $disponivel = false;
                break;
            }
        }

        
        if ($disponivel) {
            $horariosDisponiveis[] = $horarioAtual;
        }

        
        $horarioInicio->modify("+{$intervalo} minutes");
    }

    return $horariosDisponiveis;
}
?>