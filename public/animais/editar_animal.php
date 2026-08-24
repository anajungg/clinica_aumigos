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
        <h2>Editando o animal <?php echo $prato,["nome"]?>!</h2>

        <form action="atualizar_animal.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $prato["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $prato["nome"]?>">
            <br>
            <label for="descricao">Espécie:</label>
            <input type="text" name="especie" value="<?php echo $prato["descricao"]?>">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" value="<?php echo $prato["preco"]?>">
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" value="<?php echo $prato["categoria"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>