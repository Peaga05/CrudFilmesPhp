<?php
    include "./Connection/connection.php";
    include "./Assents/header.php";
    $db = BancoDeDados::getInstance();
?>
<script>
    $(document).ready(function() {
        $('#tableAtorFilme').DataTable()
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Bazinga Filmes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Filme/filme.php">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Ator/ator.php">Atores</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
    include "./Assents/footer.php"
?>