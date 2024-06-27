<?php
include 'config.php';

// Busca todas as empresas
$sql_empresas = "SELECT * FROM tbl_empresa";
$result_empresas = $conn->query($sql_empresas);

// Busca todas as contas a pagar
$sql_contas = "SELECT c.id_conta_pagar, c.valor, c.data_pagar, c.pago, e.nome
               FROM tbl_conta_pagar c
               JOIN tbl_empresa e ON c.id_empresa = e.id_empresa";
$result_contas = $conn->query($sql_contas);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Conta a Pagar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="index.php">Adicionar Conta a Pagar</a> |
        <a href="nova_empresa.php">Adicionar Empresa</a>
    </nav>
    
    <h1>Adicionar Conta a Pagar</h1>
    <form action="adicionar_conta.php" method="POST">
        <label for="empresa">Empresa:</label>
        <select name="id_empresa" id="empresa" required>
            <?php
            if ($result_empresas->num_rows > 0) {
                while($row = $result_empresas->fetch_assoc()) {
                    echo "<option value='" . $row["id_empresa"] . "'>" . $row["nome"] . "</option>";
                }
            }
            ?>
        </select><br>

        <label for="data_pagar">Data a Pagar:</label>
        <input type="date" name="data_pagar" id="data_pagar" required><br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" name="valor" id="valor" required><br>

        <button type="submit">Inserir</button>
    </form>

    <h2>Listagem de Contas a Pagar</h2>
    <table border="1">
        <tr>
            <th>Empresa</th>
            <th>Data a Pagar</th>
            <th>Valor</th>
            <th>Pago</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result_contas->num_rows > 0) {
            while($row = $result_contas->fetch_assoc()) {
                $pago = $row["pago"] ? "Sim" : "Não";
                $valor_formatado = number_format($row["valor"], 2, ',', '.');

                  // Formata a data para DD/MM/YYYY
                 $data_pagar_formatada = date('d/m/Y', strtotime($row["data_pagar"]));
                echo "<tr>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $data_pagar_formatada. "</td>
                        <td>R$ " . $valor_formatado . "</td>
                        <td>" . $pago . "</td>
                        <td>
                            <a href='editar_conta.php?id=" . $row["id_conta_pagar"] . "'>Editar</a> |
                            <a href='excluir_conta.php?id=" . $row["id_conta_pagar"] . "'>Excluir</a> |
                            <a href='marcar_paga.php?id=" . $row["id_conta_pagar"] . "'>Marcar como Paga</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhuma conta a pagar encontrada</td></tr>";
        }
        ?>
    </table>
</body>
</html>
