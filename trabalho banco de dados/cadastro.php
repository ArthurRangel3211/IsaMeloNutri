<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="stylesheet" href="style.css">
        <style>
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
                position: relative;
            }
            .inputUser{
                background: none;
                border: none;
                border-bottom: 1px solid white;
                outline: none;
                color: white;
                font-size: 15px;
                width: 100%;
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
            #data_nascimento{
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
        </style>
    </head>
    <body>
        <div class="box">
            <form action="processa.usuario.php" method="POST">
                <fieldset>
                    <legend><b>Cadastro</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="name" class="labelInput">Nome Completo</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inputUser" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                        <label for="telefone" class="labelInput">Telefone</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <p>Genero</p>
                        <input type="radio" id="Feminino" name="genero" value="Feminino" required>
                        <label for="Feminino">Feminino</label>
                        <br>
                        <input type="radio" id="Masculino" name="genero" value="Masculino" required>
                        <label for="Masculino">Masculino</label>
                        <br>
                        <input type="radio" id="Outro" name="genero" value="Outro" required>
                        <label for="Outro">Outro</label>
                    </div>
                    <br><br>
                    <div>
                        <label for="data_nascimento"><b>Data de Nascimento</b></label>
                        <input type="date" name="data_nascimento" id="data_nascimento"required>                       
                    </div>
                    <br><br>
                    <input type="submit" name="submit" id="submit">
                </fieldset>
            </form>
        </div>
    </body>
</html> 