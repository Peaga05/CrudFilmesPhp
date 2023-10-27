<?php
    include "../Connection/connection.php";
    include "../Assents/header.php";
    $db = BancoDeDados::getInstance();
    $db->fecharConexao();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CineTads</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../Filme/filme.php">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Ator/ator.php">Atores</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <a class="btn btn-success" href="./filme_create.php">Cadastrar</a>
</main>
<?php
    include "../Assents/footer.php"
?>