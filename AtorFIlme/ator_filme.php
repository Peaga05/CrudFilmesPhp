<?php
include "../Connection/connection.php";
include "../Assents/header.php";

$resposta = null;
$db = BancoDeDados::getInstance();

$sqlFilme = "SELECT * FROM filme";
$resultFilme = $db->executeBusca($sqlFilme);

$sqlAtor = "SELECT * FROM ator";
$resultAtor = $db->executeBusca($sqlAtor);


if (isset($_POST["btn-cadastrar"])) {
    $idAtor = $_POST["ator"];
    $idFilme = $_POST["filme"];
    if ($idAtor != "" && $idFilme != "") {

        $sql = "INSERT INTO atorfilme (idAtor,idFilme)
        VALUES ('$idAtor','$idFilme');";
        $resultado = $db->executeSQL($sql);
        if ($resultado) {
            $resposta = "Ator/Atriz cadastrado no filme com sucesso!";
        } else {
            $resposta = "Erro ao cadastrar!";
        }
    } else {
        $resposta = "Preencha todos os campos!";
    }
}

$db->fecharConexao();
?>
<div class="m-auto w-50 mt-4">
    <h1 class="text-center mb-1">Cadastrar Ator em Filme</h1>
    <form action="ator_filme.php" method="post" class="mt-1">
        <div class="form-floating mb-2">
            <select class="form-select" name="ator" id="ator" placeholder="Ator">
                <?php
                if ($resultAtor->num_rows > 0) {
                    while ($row = $resultAtor->fetch_assoc()) {
                        echo '<option value="'.$row["id"].'">' . $row["nome"] . " " . $row["sobrenome"] . '</option>';
                    }
                }
                ?>
            </select>
            <label for="txt-classificacao">Ator</label>
        </div>
        <div class="form-floating mb-2">
            <select class="form-select" name="filme" id="filme" placeholder="Filme">
                <?php
                if ($resultFilme->num_rows > 0) {
                    while ($row = $resultFilme->fetch_assoc()) {
                        echo '<option value="'. $row["id"] .'">' . $row["titulo"].'</option>';
                    }
                }
                ?>
            </select>
            <label for="txt-classificacao">Filme</label>
        </div>
        <div class="m-auto text-center">
            <a id="btn-voltar" class="btn btn-outline-success w-50 m-3" name="btn-voltar" href="../index.php">Voltar</a>
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