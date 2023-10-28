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
    $data = new DateTime($data);
    $data = $data->format('d-m-Y');
}
$db->fecharConexao();
?>
<link rel="stylesheet" href="../Assents/style/main.css">
<div id="container-info" class="m-auto w-50 mt-4">
    <label for="txt-titulo"><strong>Título: </strong><?php echo $titulo ?></label>
    <label for="txt-descricao"><strong>Descrição: </strong><?php echo $descricao ?></label>
    <label for="txt-data"><strong>Data de lançamento: </strong><?php echo  $data ?></label>
    <label for="txt-categoria"><strong>Categoria: </strong><?php echo $categoria ?></label>
    <label for="txt-idioma"><strong>Idioma: </strong><?php echo $idioma ?></label>
    <label for="txt-classificacao"><strong>Classificação: </strong><?php echo $classificao ?></label>
</div>
<div class="m-auto text-center">
    <a id="btn-voltar" class="btn btn-success w-50 m-3" name="btn-voltar" href="./filme.php">Voltar</a>
</div>
<?php
include "../Assents/footer.php"
?>