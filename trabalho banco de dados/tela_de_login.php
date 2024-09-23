<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta htp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/reset.min.css">
        <link rel="stylesheet" href="./css/defaul.css">
        <title>Login</title>
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
            .tela-login{
                background-color: rgba(0, 0, 0, 0.6);
                position: absolute;
                top:50%;
                left: 50%;
                transform: translate(-50%,-50%);
                padding: 50px;
                border-radius: 16px;
                color: aliceblue;
            }
            input{
                padding: 15px;
                border: none;
                font-size: 15px;
            }
            .btn{
                background-color: dodgerblue;
                border: none;
                padding: 15px;
                width: 100%;
                border-radius: 10px;
                color: antiquewhite;
                font-size: 15px;
                text-decoration: none;
            }
            .btn:hover{
                background-color: deepskyblue;
                cursor: pointer;
            }
          
            
        </style>
    </head>
    <body>
        
        <div class="box">
            <?php if(!empty($_GET['msgErro'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $_GET['msgErro'];?>
                </div>
            <?php } ?>

            <?php if(!empty($_GET['msgSucesso'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['msgSucesso'];?>
                </div>
            <?php } ?>

        </div>
        <form action="processa.login.php" method="post">
            <div class="tela-login">
                <h1>LOGIN</h1>
                <br>
                <input type="email" placeholder="Email" name="email" id="email" class="form-control">
                <br><br>
                <input type="password" placeholder="Senha" name="senha" id="senha" class="form-control">
                <br><br>
                <button type="submit" name="enviardados" class="btn">Entrar</button>
                <br><br><br>
                <a href="./cadastro.php" class="btn">Cadastrar</a>
                <br><br><br>
                <a class="btn" href="#">Esqueceu a senha?</a>
            </div>
        </form> 
        <script src="./login.js"></script>
    </body>
</html>