<?php
@session_start(); //inicia variavel de sessão
require_once("conexao.php"); //pega as info de outro arquivo
$usuario = $_POST['usuario'];
$usuario_cookie = $_POST['usuario']; //recuperando oque escreveu na label com POST pois passo como metodo post
$senha = $_POST['senha'];
$senha_para_crip = 'bNzLsJB3/H'; 
$senha_crip = openssl_encrypt($senha, "AES-128-ECB", $senha_para_crip);

$query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha_crip = :senha"); //prepare mais seguro
$query->bindValue(":email", "$usuario");
$query->bindValue(":senha", "$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$condicao =  $res[0]['ativo'];
$linhas = @count($res);

if ($linhas > 0 && $condicao == 'sim') {
    $_SESSION['nome'] = $res[0]['nome'];
    $_SESSION['id'] = $res[0]['id_login'];
    $_SESSION['nivel'] = $res[0]['nivel'];
    $_SESSION['email'] = $res[0]['email'];

    echo '<script>window.location="painel"</script>';
}else {
    echo '<script>window.alert("Dados Incorretos")</script>';
    echo '<script>window.location="index.php"</script>';
}

?>