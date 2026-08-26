<?php

include "../infra/conexao.php";

$clientes = $conexao->query(
    "SELECT * FROM clientes"
);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>

<body>

    <h1>Clientes</h1>

    <a href="cadastrar.php">Cadastrar cliente</a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>

        <?php while ($cliente = $clientes->fetch_assoc()) { ?>

            <tr>

                <td><?= $cliente['id'] ?> </td>

                <td><?= $cliente['nome'] ?></td>

                <td><?= $cliente['email'] ?></td>

                <td><?= $cliente['telefone'] ?></td>

                <td>
                <a href="detalhes.php?id=<?= $cliente['id'] ?>">Detalhes</a>

                    |

                <a href="editar.php?id=<?= $cliente['id'] ?>">Editar</a>

                    |

                <a href="excluir.php?id=<?= $cliente['id'] ?>"> Excluir</a>

                </td>

            </tr>

        <?php } ?>

    </table>

    <br>

    <a href="../../index.php">Voltar</a>

</body>

</html>
