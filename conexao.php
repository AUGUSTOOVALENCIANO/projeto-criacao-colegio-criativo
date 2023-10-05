<?php
//definir fuso horario
date_default_timezone_set('America/Sao_paulo');


//conexao com o banco de dados PDO mais segura
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';
$senhanuvem = '745duda#';

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
    echo 'Erro ao conectar ao banco de dados';
    echo '<br>';
    echo $e;
}



?>