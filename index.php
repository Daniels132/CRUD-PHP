<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    session_start();
    include('conexao.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
        <div class="principal">
            <div class="conteudo">
                <h1>Login</h1>
                <form name="login" method="POST" action="lg.php">
                <label for="nom">Usuario</label>
                    <input type="text" id="nome" name="nome"><br><br>
                <label for="sh">Senha</label>
                    <input type="password" id="senha" name="senha"><br>
                    <input type="submit" value ="Login" name = "cadastrar" class ="btn">
                </form>
                <?php
                if(isset($_SESSION['nao_autenticado'])):
                ?>
                <div style="color:#F00">Não autenticado</div><br/><br/>
                <?php endif;?>
            </div>
        </div>
    
</body>
</html>