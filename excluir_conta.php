<?php
include 'config.php';

$id_conta_pagar = $_GET['id'];

// Deletar a conta a pagar
$sql = "DELETE FROM tbl_conta_pagar WHERE id_conta_pagar = '$id_conta_pagar'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao excluir: " . $conn->error;
}

$conn->close();
?>
<a href="index.php">Voltar</a>
