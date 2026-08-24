<?php

include "../../conexao.php"

$clientes = $conexao->query(
    "SELECT * FROM clientes ORDER BY nome"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];
    $cliente_id = $_POST["cliente_id"];

    $sql = "INSERT INTO animais (nome, especie, raca, idade, cliente_id) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("sssii", $nome, $especie, $raca, $idade, $cliente_id);
    $stmt->execute();

    header("Location: ../../index.php");
    exit;
}
