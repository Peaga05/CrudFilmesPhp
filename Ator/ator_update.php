<?php
include "../Connection/connection.php";
include "../Assents/header.php";
$resposta = null;
$db = BancoDeDados::getInstance();

$atorId = $_REQUEST["id"];

$sql = "SELECT * FROM ator WHERE id=$atorId;";
$result = $db->executeBusca($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome = $row["nome"];
    $sobrenome = $row["sobrenome"];
}

if (isset($_POST["btn-alterar"])) {
    $nome =  $_POST["txt-nome"];
    $sobrenome =  $_POST["txt-sobrenome"];

    $sql = "UPDATE ator set nome = '$nome', sobrenome = '$sobrenome' WHERE id = $atorId";
    $resultado = $db->executeSQL($sql);
    if ($resultado) {
        header('Location: ator.php');
    } else {
        $resposta = "Erro ao alterar o ator.";
    }
}
$db->fecharConexao();
?>
<div class="m-auto w-50 mt-4">
    <h1 class="text-center mb-1">Alterar Ator</h1>
    <form method="post" class="mt-1">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-nome" id="txt-nome" placeholder="Nome" value='<?php echo $nome ?>'>
            <label for="txt-nome">Nome</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-sobrenome" id="txt-sobrenome" placeholder="Sobrenome" value='<?php echo $sobrenome ?>'>
            <label for="txt-sobrenome">Sobrenome</label>
        </div>
        <div class="m-auto text-center">
            <a id="btn-voltar" class="btn btn-outline-success w-50 m-3" name="btn-voltar" href="./ator.php">Voltar</a>
            <input type="submit" class="btn btn-success w-50" value="Alterar" name="btn-alterar" id="btn-alterar">
        </div>
    </form>
</div>
<?php if ($resposta !== null) { ?>
    <div class="w-25 float-right alert-dismissible fade show fixed-bottom alert alert-danger">
        <?php echo $resposta; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
<?php } ?>
<script src="../Assents/mascara.js"></script>
<?php
include "../Assents/footer.php"
?>