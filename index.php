<?php
include "./Connection/connection.php";
include "./Assents/header.php";
$db = BancoDeDados::getInstance();
$sql = "SELECT a.nome, a.sobrenome, f.titulo FROM AtorFilme af INNER JOIN ator a on a.id = af.idAtor INNER JOIN filme f on f.id = af.idFilme";
$result = $db->executeBusca($sql);
$db->fecharConexao()
?>
<script>
    $(document).ready(function() {
        $('#tableAtorFilme').DataTable()
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Bazinga Filmes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Filme/filme.php">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Ator/ator.php">Atores</a>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-light" href="./AtorFIlme/ator_filme.php">Cadastrar ator em filme</a>
            </form>
        </div>
    </div>
</nav>
<main>
    <?php
    echo "<div class='mt-5 w-75 m-auto'><table id='tableAtorFilme' class='table table-hover' border='1'><thead><tr><th>Titulo</th><th>Nome ator</th></tr></thead><tbody>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["titulo"] ."</td><td>" . $row["nome"] . " " . $row["sobrenome"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</tbody></table></div>";
    ?>
</main>
<?php
include "./Assents/footer.php"
?>