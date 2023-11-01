<?php

include "../Connection/connection.php";
include "../Assents/header.php";
$resposta = null;
$db = BancoDeDados::getInstance();

$atorId = $_REQUEST["id"];

$erro = false;
$sql = "SELECT * FROM ator WHERE id=$atorId;";
$result = $db->executeBusca($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome = $row["nome"];
    $sobrenome = $row["sobrenome"];
}

$sqlAtorFilme = "SELECT * FROM atorFilme WHERE idAtor=$atorId";
$resultAtorFilme = $db->executeBusca($sqlAtorFilme);
if ($resultAtorFilme->num_rows > 0) {
   $erro = true;
}

if (isset($_POST["btn-excluir"])) {

    $sql = "DELETE FROM ator 
  WHERE id = $atorId;";

    $resultado = $db->executeSQL($sql);
    if ($resultado) {
        header('Location: ./ator.php');
    } else {
        $resposta = "Erro ao excluir o ator.";
    }
}
$db->fecharConexao();
?>
<?php if(!$erro){?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form method="post" class="text-center w-50">
        <h2 class="text-center">
            Tem certeza que deseja excluir o ator: <?php echo $nome . " " . $sobrenome; ?> ?
        </h2>
        <div class="text-center">
            <input type="submit" class="btn btn-danger w-25 m-3" value="Excluir" name="btn-excluir" id="btn-excluir">
            <a id="btn-voltar" class="btn btn-outline-danger w-25 m-3" name="btn-voltar" href="./ator.php">Cancelar</a>
        </div>
    </form>
</div>
<?php }else{?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form method="post" class="text-center w-50">
        <h2 class="text-center mt-5">
            Não é possível remover o ator  <?php echo $nome . " " . $sobrenome; ?>, pois ele participa de um filme!
        </h2>
        <div class="text-center">
            <a id="btn-voltar" class="btn btn-outline-danger w-25 m-3" name="btn-voltar" href="./ator.php">Cancelar</a>
        </div>
    </form>
</div>
<?php }?>
<?php if ($resposta !== null) { ?>
    <div class="w-25 float-right alert-dismissible fade show fixed-bottom alert alert-danger">
        <?php echo $resposta; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
<?php } ?>
<?php
include "../Assents/footer.php"
?>