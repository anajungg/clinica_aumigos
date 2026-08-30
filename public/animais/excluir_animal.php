<?php

$id = $_GET ['id'];

include '../../infra/conexao.php';

$sql = "DELETE FROM pets WHERE id = $id";
if ($conn->query($sql) === TRUE) {
echo "Animal foi excluído";
echo "<button type="button" onclick=\"window.location.href='../../index.php'\">Voltar</button>;"
} else {
    echo "Erro ao excluir o animal: ". $conn->error;
}

?>