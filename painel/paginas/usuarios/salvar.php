<?php
$tabela = "usuario";
require_once("../../../conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nivel = $_POST['nivel'];
$unidade = $_POST['unidade'];
$telefone = $_POST['telefone'];
$sim = 'sim';
$senha = '123';
$senha_para_crip = 'bNzLsJB3/H'; //definindo a senha para criptografia
$criptografia = openssl_encrypt($senha, "AES-128-ECB", $senha_para_crip); //criptografando aqui
$descriptografia = openssl_decrypt($senha, "AES-128-ECB", $senha_para_crip); //descriptografando aqui
$senha_crip = $criptografia;


$query = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = '$senha', senha_crip = '$senha_crip', nivel = '$nivel', ativo = '$sim', telefone = :telefone ,foto = 'sem-foto.jpg', Unidade = '$unidade' ");
$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->execute();







?>