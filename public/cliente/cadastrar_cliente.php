<?php

include "../../infra/conexao.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("ssi", $nome, $email, $telefone);
    $stmt->execute();

      if ($conn->query($sql) === TRUE) {
        echo "Novo cliente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Adicionar Novo Cliente</title>
</head>

<body>
    <h2> Adicionar um novo cliente </h2>
    <form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="telefone">telefone:</label>
    <input type="tel" id="telefone" name="telefone" required>
    <br><br> 
<button type="submit"> Cadastrar Animal</button>
</form>
<br>
<button type="button" onclick="window.location.href='../../index.php'">Voltar</button>
</body>

</html>


