<?php
include 'config.php';

$id_empresa = $_POST['id_empresa'];
$data_pagar = $_POST['data_pagar'];
$valor = $_POST['valor'];

$sql = "INSERT INTO tbl_conta_pagar (id_empresa, data_pagar, valor) VALUES ('$id_empresa', '$data_pagar', '$valor')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
