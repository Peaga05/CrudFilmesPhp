<?php
include "../Connection/connection.php";
include "../Assents/header.php";
$db = BancoDeDados::getInstance();
$sql = "SELECT * FROM ator";
$result = $db->executeBusca($sql);
$db->fecharConexao();
?>
<script>
    $(document).ready(function() {
        $('#tableAtor').DataTable()
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Baiznga Filmes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Filme/filme.php">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../Ator/ator.php">Atores</a>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-light" href="./ator_create.php">Cadastrar novo ator</a>
            </form>
        </div>
    </div>
</nav>
<main>
<?php
    echo "<div class='mt-5 w-75 m-auto'><table id='tableAtor' class='table table-hover' border='1'><thead><tr><th>Nome</th><th>Sobrenome</th><th>Ações</th></tr></thead><tbody>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["sobrenome"] . "</td>";
            echo "<td><a class='btn btn-primary m-1' href='ator_read.php?id=" . $row["id"] . "'><i class='bi bi-book'></i><a>";
            echo "<a class='btn btn-warning m-1' href='ator_update.php?id=" . $row["id"] . "'><i class='bi bi-pencil'></i><a>";
            echo "<a class='btn btn-danger m-1' href='ator_delete.php?id=" . $row["id"] . "'><i class='bi bi-trash'></i><a>";
            echo "</td></tr>";
        }
    }
    echo "</tbody></table></div>";
    ?>
</main>
<?php
include "../Assents/footer.php"
?>