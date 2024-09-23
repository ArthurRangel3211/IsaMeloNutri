<?php
session_start();

if (empty($_SESSION)) {
    header("Location: tela_de_login.php?msgErro = Favor efeue o login!");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta htp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/reset.min.css">
        <link rel="stylesheet" href="./css/defaul.css">
        <link rel="stylesheet" href="./css/style.css">
        <title>Agendamento</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: 0;
            }

            body{
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 0; 
                background-image: url('../imagens/fundotelalogin.jpeg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
            }
            .box{
                background-color: #ffffff05;
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(25px);
                position:absolute;
                top:50%;
                left: 50%;
                transform: translate(-50%,-50%);
                padding: 15px;
                border-radius: 20px;
                width: 30%;
                color: white;
            }
            fieldset{
                border: 3px solid  #1d4e1d
            }
            legend{
                border:3px solid #1d4e1d;
                padding: 10px;
                text-align: center;
                background-color: #1d4e1d;
                border-radius: 9px;
                color: white;
            }
            .inputBox{
                padding-left: 10px;
                position: relative;
            }
            .inputUser{
                background: none;
                border: none;
                border-bottom: 1px solid white;
                outline: none;
                color: white;
                font-size: 15px;
                width: 50%;
                letter-spacing: 2px;
            }
            .labelInput{
                position: absolute;
                top: 0px;
                left: 0px;
                pointer-events: none;
                transition: .5s;
            }
            .inputUser:focus ~ .labelInput,
            .inputUser:valid ~ .labelInput{
                top: -20px;
                font-size: 12px;
            }
            #data{
                border: none;
                padding: 8px;
                border-radius: 10px;
                outline: none;
                font-size: 15px;
            }
            #horario{
                border: none;
                padding: 8px;
                border-radius: 10px;
                outline: none;
                font-size: 15px;
            }
            #submit{
                background-color: #626f5e;
                width: 100%;
                border:none;
                padding: 15px;  
                color:white;
                font-size: 15px;                
                cursor: pointer;
                border-radius: 10px;
            }
            #submit:hover{
                background-image:#4c5948 ;
            }
            .error{
                color:white;
                background:red;
                display: none;
                
            }
           
            .select-wrapper {
                position: relative; 
            }

            select option {
                background-color: rgba(255, 255, 255, 0.5);
                color: black; 
            }

            #horario {
                background-color: rgba(255, 255, 255, 0.1); 
                color: white; 
                padding: 8px; 
                border-radius: 10px; 
                font-size: 15px; 
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none; 
            }

            #horario {
                transition: background-color 0.3s ease, border-color 0.3s ease;
            }

            #horario:hover {
                background-color: rgba(255, 255, 255, 0.2); 
                border-color: #4c5948; 
            }
        </style>
                    <script>
                        function formatarData(data) {
                                    const partes = data.split('/');
                                    const dia = partes[0];
                                    const mes = partes[1];
                                    const ano = partes[2];
                                    return '${ano}-${mes}-${dia}';
                                }
                        function carregarHorariosDisponiveis(dataEscolhida) {
                            // Envia a requisição ao PHP que retornará os horários disponíveis
                            fetch('horarios_disponiveis.php?data=' + dataEscolhida)
                                .then(response => response.json())
                                .then(horarios => {
                                    const horarioSelect = document.getElementById('horario');
                                    horarioSelect.innerHTML = ''; // Limpa os horários anteriores

                                    // Adiciona os novos horários ao campo de seleção
                                    horarios.forEach(horario => {
                                        const option = document.createElement('option');
                                        option.value = horario;
                                        option.textContent = horario;
                                        horarioSelect.appendChild(option);
                                    });
                                })
                                .catch(error => console.error('Erro ao carregar horários:', error));
                        }
                        </script>
    </head>    
        <body>
            <div class="box">
                <form action="processa.agendamento.php" method="post">
                    <fieldset>
                        <legend><b>Agendamento</b></legend>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="nome" id="nome" class="inputUser" value=" <?php echo $_SESSION['nome']; ?>  " required>
                            <label for="nome">Nome Completo</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="tel" name="telefone" id="telefone" class="inputUser" value=" <?php echo $_SESSION['telefone']; ?>" required>
                            <label for="telefone">Celular</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="date" name="data" id="data" class="inputUser" required onchange="carregarHorariosDisponiveis(this.value)">
                            <label for="data">Data</label>
                        </div>
                        <br><br>
                        <div class="inputBox select-wrapper">
                            <select name="horario" id="horario" class="inputUser" required>   
                            </select>
                            <label for="horario">Horário</label>
                        </div>    
                        <br><br>
                        <div class="inputBox">
                            <p>Forma de Pagamento</p>
                            <input type="radio" name="pagamento" id="pix" value="pix" required>
                            <label for="pix">Pix</label>
                            <br>
                            <input type="radio" name="pagamento" id="debito" value="debito" required>
                            <label for="debito">Débito</label>
                            <br>
                            <input type="radio" name="pagamento" id="credito" value="credito" required>
                            <label for="credito">Crédito</label>
                       </div>
                       <br><br>
                       <input type="submit" name="submit" id="submit">
                       <br><br>
                    </fieldset>
                </form>
            </div>  
        </body>
</html>        