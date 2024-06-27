<?php
//Configuração banco de dados

$servername = "localhost"; 
$username = "root";   
$password = "";    
$dbname = "desafio_php"; 

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
