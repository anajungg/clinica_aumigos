<?php

include "../infra/conexao.php";

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id = $id";
$cliente_editantes = $conn->query($sql);
$cliente = $cliente_editando->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssi", $nome, $email, $telefone);
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
    <title>Editar cliente</title>
    <link rel="stylesheet" href="../../styles.css">
</head>

<body>
    <main>
        <h2>Editando o cliente <?php echo $cliente["nome"]?>!</h2>

        <form action="atualizar_cliente.php" method="POST">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $cliente["nome"]?>">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $cliente["email"]?>">
            <br>
            <label for="telefone">Telefone:</label>
            <input type="tel" name="telefone" value="<?php echo $cliente["telefone"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
</body>

</html>