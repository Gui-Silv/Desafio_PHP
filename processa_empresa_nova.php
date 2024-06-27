<?php
include 'config.php';

$nome = $_POST['nome'];

$sql = "INSERT INTO tbl_empresa (nome) VALUES ('$nome')";

if ($conn->query($sql) === TRUE) {
    echo "Nova empresa adicionada com sucesso";
    header("Location: index.php");
    exit();
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
