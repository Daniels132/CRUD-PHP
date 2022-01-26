<?php
include('conexao.php');

$idCliente = -1;
$nome   = "";
$cpf  = "";
$endereco  = "";
$cidade = "";
$estado     = "";
 

    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["endereco"]) && isset($_POST['cidade']) && isset($_POST['estado']))
    {
        if(empty($_POST["nome"]))
            $erro = "Campo nome obrigatório";
        elseif(empty($_POST["cpf"]))
            $erro = "Campo cpf obrigatório";
        elseif(empty($_POST["endereco"]))
            $erro = "Campo endereco obrigatório";
        elseif(empty($_POST["cidade"]))
            $erro = "Campo cidade obrigatório";
        elseif(empty($_POST["estado"]))
            $erro = "Campo estado obrigatório";
        else{
                $idCliente = $_POST['idCliente'];
                $nome   = $_POST["nome"];
                $cpf  = $_POST["cpf"];
                $endereco  = $_POST["endereco"];
                $cidade  = $_POST["cidade"];
                $estado  = $_POST["estado"];

                if($idCliente == -1){
                    $stmt = $conect->prepare("INSERT INTO `cliente` (`nome`,`cpf`, `endereco`, `cidade`,`estado`) VALUES (?,?,?,?,?)");
                    $stmt->bind_param('sssss', $nome, $cpf, $endereco, $cidade, $estado);
                    if(!$stmt->execute())
                    {
                        $erro = $stmt->error;
                    }
                    else
                    {
                        header('Location: principal.php');
                        exit;
                    }
                }
                elseif(is_numeric($idCliente) && $idCliente  >=1){
                    $stmt = $conect->prepare("UPDATE `cliente` SET `nome`=?, `cpf`=?, `endereco`=?, `cidade`=?, `estado` = ? WHERE idCliente = ? ");
			        $stmt->bind_param('sssssi', $nome, $cpf, $endereco, $cidade, $estado, $idCliente);
                    if(!$stmt->execute())
                    {
                        $erro = $stmt->error;
                    }
                    else
                    {
                        header('Location: principal.php');
                        exit;
                    }
                }
                else{
                    $erro = "Numero invalido";
                }
            }
            
            
            if(isset($erro)){
                $_SESSION['erro'] = true;
                header('Location: principal.php');  
                exit;
            }                  
    }
    elseif(isset($_GET['idCliente']) && is_numeric($_GET['idCliente'])){
        $id = (int)$_GET["idCliente"];
        if(isset($_GET['del'])){
            $stmt = $conect->prepare("DELETE FROM `cliente` WHERE idCliente = ?");
            $stmt->bind_param('i', $idCliente);
            $stmt->execute();
		
            header("Location:cadastro.php");
            exit;
        }
        else{
        $stmt = $conect->prepare("SELECT * FROM `cliente` WHERE idCliente = ?"); 
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        $aux_query = $result->fetch_assoc();

        $nome = $aux_query["nome"];
        $cpf = $aux_query["cpf"];
        $endereco = $aux_query["endereco"];
        $cidade = $aux_query["cidade"];
        $estado = $aux_query["estado"];
 
	    $stmt->close();
        }

    }


                
?>

