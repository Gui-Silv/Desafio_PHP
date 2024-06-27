<?php
include 'config.php';

$id_conta_pagar = $_POST['id_conta_pagar'];
$id_empresa = $_POST['id_empresa'];
$data_pagar = $_POST['data_pagar'];
$valor = $_POST['valor'];

$sql = "UPDATE tbl_conta_pagar 
        SET id_empresa = '$id_empresa', data_pagar = '$data_pagar', valor = '$valor' 
        WHERE id_conta_pagar = '$id_conta_pagar'";

if ($conn->query($sql) === TRUE) {
    echo "Conta atualizada com sucesso";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

$conn->close();
?>
<a href="index.php">Voltar</a>
