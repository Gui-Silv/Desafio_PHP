<?php
include 'config.php';

$id_conta_pagar = $_GET['id'];

// Buscar informações da conta a pagar
$sql_conta = "SELECT * FROM tbl_conta_pagar WHERE id_conta_pagar = '$id_conta_pagar'";
$result_conta = $conn->query($sql_conta);

if ($result_conta->num_rows > 0) {
    $conta = $result_conta->fetch_assoc();
    
    $valor = $conta['valor'];
    $data_pagar = $conta['data_pagar'];
    $hoje = time(); // Obtém a data atual em segundos 
    
    // Converter data_pagar para segundos 
    $data_pagar_seconds = strtotime($data_pagar);
    
    // Comparar a data de pagamento com a data atual
    if ($hoje < $data_pagar_seconds) {
        $valor_pago = $valor - ($valor * 0.05);
        
    } elseif ($hoje > $data_pagar_seconds) {
        $valor_pago = $valor + ($valor * 0.10);
    } else {
        $valor_pago = $valor;
    }
    
    // Atualizar o status de pagamento e o valor pago na tabela
    $sql_update = "UPDATE tbl_conta_pagar SET pago = 1, valor_pago = '$valor_pago' WHERE id_conta_pagar = '$id_conta_pagar'";
    
    if ($conn->query($sql_update) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao marcar como paga: " . $conn->error;
    }
} else {
    echo "Conta não encontrada";
}

$conn->close();
?>



