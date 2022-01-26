<?php
session_start();
include('conexao.php');

$usuario = mysqli_real_escape_string($conect, $_POST['nome']);
$senha = mysqli_real_escape_string($conect, $_POST['senha']);

$query = "select nome, senha from usuario where nome = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conect, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['nome'] = $usuario;
    header('Location: principal.php');
}
else{
    $_SESSION['nao_autenticado'] = true;
    header('Location:index.php');
    exit();
}


?>