<?php

include "../Connection/connection.php";
include "../Assents/header.php";
$resposta = null;
$db = BancoDeDados::getInstance();

$filmeId = $_REQUEST["id"];


$sql = "SELECT * FROM filme WHERE id=$filmeId;";
$result = $db->executeBusca($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $titulo = $row["titulo"];
}

if (isset($_POST["btn-excluir"])) {

    $sql = "DELETE FROM filme 
  WHERE id = $filmeId;";

    $resultado = $db->executeSQL($sql);
    if ($resultado) {
        header('Location: ./filme.php');
    } else {
        $resposta = "Erro ao alterar o filme.";
    }
}
$db->fecharConexao();
?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form method="post" class="text-center w-50">
        <h2 class="text-center">
            Tem certeza que deseja excluir o filme: <?php echo $titulo; ?> ?
        </h2>
        <div class="text-center">
            <input type="submit" class="btn btn-danger w-25 m-3" value="Excluir" name="btn-excluir" id="btn-excluir">
            <a id="btn-voltar" class="btn btn-outline-danger w-25 m-3" name="btn-voltar" href="./filme.php">Cancelar</a>
        </div>
    </form>
</div>

<?php if ($resposta !== null) { ?>
    <div class="w-25 float-right alert-dismissible fade show fixed-bottom alert alert-danger">
        <?php echo $resposta; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
<?php } ?>

<?php
include "../Assents/footer.php"
?>