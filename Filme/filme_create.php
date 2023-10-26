<?php
    include "../Connection/connection.php";
    include "../Assents/header.php";
    $resposta = null;
    $db = BancoDeDados::getInstance();
    if(isset($_POST["btn-cadastrar"])){
        $titulo = $_POST["txt-titulo"];
        $descricao = $_POST["txt-descricao"];
        $data = $_POST["txt-data"];
        $categoria = $_POST["txt-categoria"];
        $idioma = $_POST["txt-idioma"];
        $classificao = $_POST["txt-classificacao"];
        $sql = "INSERT INTO filme (titulo,descricao,anoLancamento,categoria,idioma,classificao)
        VALUES ('$titulo','$descricao','$data','$categoria','$idioma', '$classificao');";
        $resultado = $db->executeSQL($sql);
        if ($resultado) {
            $resposta = "Filme cadastrado com sucesso.";
        } else {
            $resposta = "Erro ao cadastrar o filme.";
        }
    }
?>
<div class="m-auto w-50 mt-4">
    <h1 class="text-center mb-1">Cadastrar Filme</h1>
    <form action="" method="post" autocomplete="off" class="mt-1">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-titulo" id="txt-titulo" placeholder="Título">
            <label for="txt-titulo">Título</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-descricao" id="txt-descricao" placeholder="Descrição">
            <label for="txt-descricao">Descrição</label>
        </div>
        <div class="form-floating mb-2">
            <input type="date" class="form-control" name="txt-data" id="txt-data">
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-categoria" id="txt-categoria" placeholder="Categoria">
            <label for="txt-categoria">Categoria</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-idioma" id="txt-idioma" placeholder="Idioma">
            <label for="txt-idioma">Idioma</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="txt-classificacao" id="txt-classificacao" placeholder="Classificação">
            <label for="txt-classificacao">Classificação</label>
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
<script src="../Assents/mascara.js"></script>
<?php
    include "../Assents/footer.php"
?>