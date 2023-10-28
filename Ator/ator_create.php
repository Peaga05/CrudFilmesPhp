<?php
include "../Connection/connection.php";
include "../Assents/header.php";

$resposta = null;
$db = BancoDeDados::getInstance();
if (isset($_POST["btn-cadastrar"])) {

    $nome = $_POST["txt-nome"];
    $sobrenome = $_POST["txt-sobrenome"];
    if ($nome != "" && $sobrenome != "") {

        $sql = "INSERT INTO ator (nome,sobrenome)
        VALUES ('$nome','$sobrenome');";
        $resultado = $db->executeSQL($sql);
        if ($resultado) {
            $resposta = "Ator/Atriz cadastrado com sucesso!";
        } else {
            $resposta = "Erro ao cadastrar!";
        }

        $nome = "";
        $sobrenome = "";

    }else{
        $resposta = "Preencha todos os campos!";
    }
}
$db->fecharConexao();
?>
<div class="m-auto w-50 mt-4">
    <h1 class="text-center mb-1">Cadastrar Ator</h1>
    <form action="ator_create.php" method="post" class="mt-1">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-nome" id="txt-nome" placeholder="Nome">
            <label for="txt-nome">Nome</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-sobrenome" id="txt-sobrenome" placeholder="Sobrenome">
            <label for="txt-sobrenome">Sobrenome</label>
        </div>
        <div class="m-auto text-center">
            <a id="btn-voltar" class="btn btn-outline-success w-50 m-3" name="btn-voltar" href="./ator.php">Voltar</a>
            <input type="submit" class="btn btn-success w-50" value="Cadastrar" name="btn-cadastrar" id="btn-cadastrar">
        </div>
    </form>
</div>
<?php if ($resposta !== null) { ?>
    <div class="w-25 float-right alert-dismissible fade show fixed-bottom alert <?php echo ($resultado) ? 'alert-success' : 'alert-danger'; ?>">
        <?php echo $resposta; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
<?php } ?>
<?php
include "../Assents/footer.php"
?>