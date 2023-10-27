<?php
include "../Connection/connection.php";
include "../Assents/header.php";

$db = BancoDeDados::getInstance();
$db->fecharConexao();
?>
<div class="m-auto w-50 mt-4">
    <h1 class="text-center mb-1">Cadastrar Filme</h1>
    <form action="" autocomplete="off" class="mt-1">
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
<?php
include "../Assents/footer.php"
?>