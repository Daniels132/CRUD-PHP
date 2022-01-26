<?php
session_start();
include('conexao.php');
include('cad.php');
echo '<h2> Olá, '. $_SESSION['nome'] . '</h2>';
echo '<h2><a href="logout.php" class=btn>Sair</a></h2>';
if(isset($_SESSION['erro']))
            echo'<div style="color:#F00">erro</div><br/><br/>';
?>


<link rel="stylesheet" href="style.css">
<table width="400px" border="0" cellspacing="0">
 
<p class ="texto">Para editar um registro, basta passar o ID do cliente no campo idCliente e preencher as informações que serao alteradas</p>
    <tr>
        <th><strong>idCliente</strong></th>
        <th><strong>Nome</strong></th>
        <th><strong>CPF</strong></th>
        <th><strong>Enderço</strong></th>
        <th><strong>Cidade</strong></th>
        <th><strong>Estado</strong></th>
    </tr>
        <tr>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
            <td><input type="hidden"id="idCliente" name="idCliente" value="<?=$idCliente?>"></td>
            <td><input type="text" id="nome" name="nome" value="<?=$nome?>"></td>
            <td><input type="text" id="cpf" name="cpf" value="<?=$cpf?>"></td>
            <td><input type="text" id="endereco" name="endereco" value="<?=$endereco?>"></td>
            <td><input type="text" id="cidade" name="cidade" value="<?=$cidade?>"></td>
            <td><input type="text" id="estado" name="estado" value="<?=$estado?>"></td>
            <td><button type="submit" name="cadastrarUsu" class ="btn"><?=($idCliente==-1)?"Cadastrar":"Salvar"?></button></td>
         </form>
        </tr>
    
<?php
$result = $conect->query("SELECT * FROM `cliente`");
while ($aux_query = $result->fetch_assoc()) 
{
    echo '<tr>';
    echo '  <td>'.$aux_query["idCliente"].'</td>';
    echo '  <td class ="td">'.$aux_query["nome"].'</td>';
    echo '  <td class ="td">'.$aux_query["cpf"].'</td>';
    echo '  <td class ="td">'.$aux_query["endereco"].'</td>';
    echo '  <td class ="td">'.$aux_query["cidade"].'</td>';
    echo '  <td class ="td">'.$aux_query["estado"].'</td>';
    echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["idCliente"].'">Editar</a></td>';
    echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["idCliente"].'&del=true">Excluir</a></td>';
    echo '</tr>';
}
?>
</table>

