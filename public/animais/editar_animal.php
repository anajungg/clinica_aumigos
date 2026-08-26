<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$resultado = $conexao->query(
    "SELECT * FROM animais WHERE id = $id"
);

$animal = $resultado->fetch_assoc();

$clientes = $conexao->query(
    "SELECT * FROM clientes ORDER BY nome"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];
    $cliente_id = $_POST["cliente_id"];

    $sql = "UPDATE animais
    SET nome = ?, especie = ?, raca = ?, idade = ?, cliente_id = ?
    WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("sssiii", $nome, $especie, $raca, $idade, $cliente_id, $id);

    $stmt->execute();

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
    <link rel="stylesheet" href="../../styles.css">
</head>

<body>
    <main>
        <h2>Editando o animal <?php echo $animal["nome"]?>!</h2>

        <form action="atualizar_animal.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $animal["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $animal["nome"]?>">
            <br>
            <label for="especie">Espécie:</label>
            <input type="text" name="especie" value="<?php echo $animal["especie"]?>">
            <br>
            <label for="raca">Raça:</label>
            <input type="text" name="raca" value="<?php echo $animal["raca"]?>">
            <br>
        
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id">
                <?php while ($cliente = $clientes->fetch_assoc()): ?>
                    <option value="<?php echo $cliente["id"] ?>" <?php echo $animal["cliente_id"] == $cliente["id"] ? "selected" : "" ?>>
                        <?php echo $cliente["nome"] ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>