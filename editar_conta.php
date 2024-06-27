<?php
include 'config.php';

$id_conta_pagar = $_GET['id'];

// Busca os detalhes da conta a pagar
$sql_conta = "SELECT * FROM tbl_conta_pagar WHERE id_conta_pagar = '$id_conta_pagar'";
$result_conta = $conn->query($sql_conta);
$conta = $result_conta->fetch_assoc();

// Busca todas as empresas
$sql_empresas = "SELECT * FROM tbl_empresa";
$result_empresas = $conn->query($sql_empresas);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Conta a Pagar</title>
</head>
<body>
    <h1>Editar Conta a Pagar</h1>
    <form action="atualizar_conta.php" method="POST">
        <input type="hidden" name="id_conta_pagar" value="<?php echo $id_conta_pagar; ?>">
        
        <label for="empresa">Empresa:</label>
        <select name="id_empresa" id="empresa" required>
            <?php
            if ($result_empresas->num_rows > 0) {
                while($row = $result_empresas->fetch_assoc()) {
                    $selected = ($row["id_empresa"] == $conta["id_empresa"]) ? "selected" : "";
                    echo "<option value='" . $row["id_empresa"] . "' $selected>" . $row["nome"] . "</option>";
                }
            }
            ?>
        </select><br>

        <label for="data_pagar">Data a Pagar:</label>
        <input type="date" name="data_pagar" id="data_pagar" value="<?php echo $conta['data_pagar']; ?>" required><br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" name="valor" id="valor" value="<?php echo $conta['valor']; ?>" required><br>

        <button type="submit">Atualizar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>
