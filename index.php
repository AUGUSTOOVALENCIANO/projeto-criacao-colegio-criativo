<?php
require_once("conexao.php");
//variaveis globais


$nome_sistema = 'Register Software';
$email_sistema = 'registersoftware2004@gmail.com';
$senha = '123';
$adm = 'Administrativo';
$sim = 'sim';
$um = 1;
$senha_para_crip = 'bNzLsJB3/H'; //definindo a senha para criptografia
$criptografia = openssl_encrypt($senha, "AES-128-ECB", $senha_para_crip); //criptografando aqui
$descriptografia = openssl_decrypt($senha, "AES-128-ECB", $senha_para_crip); //descriptografando aqui
$senha_crip = $criptografia;
$query = $pdo->query("SELECT * FROM usuarios"); //criando login caso nao tenha nenhum
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas == 0){
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_sistema', email = '$email_sistema', senha = '$senha', senha_crip = '$senha_crip', nivel = '$adm', ativo = '$sim', foto = 'sem-foto.jpg', Unidade = '$um' ");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafica - Criativo</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/projeto/css/imagens/icone.png">
</head>

<body>
    <div class="login">
        <div class="form">
        <img src="/projeto/css/imagens/imagem_login.png" class="imagem_login">
        <h3 class="titulologin">Dados de Acesso</h3>
            <form class="registro" method="post" action="autentica.php"> <!-- metodo post mais seguro pois nao passa por URL -->
                <input type="email" name="usuario" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button>Login</button>
                <div class="rodape   hidden-xs">
                    <h4 style="margin-top: 5px !important">
                    Registrado: Colegio Criativo Todos os direitos reservados.                    </h4>
                </div>
            </form>
        </div>
    </div>
</body>

</html>