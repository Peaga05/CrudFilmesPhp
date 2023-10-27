<?php
include "../Connection/connection.php";
include "../Assents/header.php";
$db = BancoDeDados::getInstance();

$filmeId = $_REQUEST["id"];

$sql = "SELECT * FROM filme WHERE id=$filmeId;";
$result = $db->executeBusca($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $titulo = $row["titulo"];
    $descricao = $row["descricao"];
    $data = $row["anoLancamento"];
    $categoria = $row["categoria"];
    $idioma = $row["idioma"];
    $classificao = $row["classificao"];
}
$db->fecharConexao();
?>
<div class="m-auto w-50 mt-4">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-titulo" id="txt-titulo" placeholder="Título" value='<?php echo $titulo ?>'>
            <label for="txt-titulo">Título</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-descricao" id="txt-descricao" placeholder="Descrição" value='<?php echo $descricao ?>'>
            <label for="txt-descricao">Descrição</label>
        </div>
        <div class="form-floating mb-2">
            <input type="date" class="form-control" name="txt-data" id="txt-data" value='<?php echo $data ?>'>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-categoria" id="txt-categoria" placeholder="Categoria" value='<?php echo $categoria ?>'>
            <label for="txt-categoria">Categoria</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-idioma" id="txt-idioma" placeholder="Idioma" value='<?php echo $idioma ?>'>
            <label for="txt-idioma">Idioma</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-classificacao" id="txt-classificacao" placeholder="Classificação" value='<?php echo $classificao ?>'>
            <label for="txt-classificacao">Classificação</label>
        </div>
        <div class="m-auto text-center">
            <a id="btn-voltar" class="btn btn-outline-success w-50 m-3" name="btn-voltar" href="./filme.php">Voltar</a>
        </div>
</div>

<?php
include "../Assents/footer.php"
?>