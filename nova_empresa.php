<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Empresa</title>
</head>
<body>
<nav>
    <a href="index.php">Adicionar Conta a Pagar</a> |
    <a href="nova_empresa.php">Adicionar Empresa</a>
</nav>

    <h1>Adicionar Empresa</h1>
    <form action="processa_empresa_nova.php" method="POST">
        <label for="nome">Nome da Empresa:</label>
        <input type="text" name="nome" id="nome" required><br>
        <button type="submit">Inserir</button>
    </form>
</body>
</html>
